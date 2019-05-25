<?php
namespace App\controllers;

use App\models\QueryBuilder;
use App\models\ImageBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;

class AdminController{

    private $templates;
    private $auth;
    private $qb;
    private $ib;

    private $data;
    private $selectAll;
    private $paginator;

    private $getOne;

    public function __construct(QueryBuilder $qb, Engine $engine, Auth $auth, ImageBuilder $ib)
    {
        $this->qb = $qb;
        $this->templates = $engine;
        $this->auth = $auth;
        $this->ib = $ib;

        $this->templates->addFolder('admin', '../app/views/admin');
        $getUserAvatar = $this->qb->getOne('users', $this->auth->getUserId());
        $getPopularPosts = $this->qb->getPopular('posts', 'views_post');
        $latestPosts = $this->data = $this->qb->getAll('posts', '3');
        $this->templates->addData(
            ['auth' => $this->auth,
                'getUserAvatar' => $getUserAvatar,
                'getPopularPosts' => $getPopularPosts,
                'latestPosts' => $latestPosts],
            ['profile-user', 'edit-profile', 'layout',
                'admin::admin-layout', 'admin::admin-add-post-form',
                'admin::admin-edit-post-form', 'singlepage']);
    }

    public function admin(){
        if (!$this->auth->hasAnyRole(\Delight\Auth\Role::ADMIN)){
            header("Location: /");
        }
        //Получаю данные из метода getAll() в QueryBuilder
        $this->data = $this->qb->getAll('posts', '10');
        //Извлекаю отдельно вывод постов
        $this->selectAll = $this->data['items'];
        //Извлекаю отдельно пагинацию
        $this->paginator = $this->data['paginator'];
        //Вывожу шаблон страницы и передаю ей данные
        echo $this->templates->render('admin::admin-layout', ['arrayItems' => $this->selectAll, 'paginator' => $this->paginator]);
    }

    public function adminEditPostForm($id){
        if (!$this->auth->hasAnyRole(\Delight\Auth\Role::ADMIN)):
            header("Location: /");
        endif;
        $this->getOne = $this->qb->getOne('posts', $id);
        echo $this->templates->render('admin::admin-edit-post-form',
            ['onePost' => $this->getOne]);
    }

    public function adminAddPostForm(){
        if (!$this->auth->hasAnyRole(\Delight\Auth\Role::ADMIN)):
            header("Location: /");
        endif;
        echo $this->templates->render('admin::admin-add-post-form');
    }

    public function addPost(){
        if (!$this->auth->hasAnyRole(\Delight\Auth\Role::ADMIN)):
            header("Location: /");
        endif;
        $images = $this->ib->saveImagePost();
        $_POST['images'] = $images;
        $this->qb->insert('posts', $_POST);
        header("Location: /admin");
    }

    public function updatePost(){
        if(!$_FILES['pictures']['name']){
            //Изъять последний элемент из массива
            $images = array_pop($_POST);
            //Добавить элемент к массиву
            $_POST['images'] = $images;
            //Изъять первый элемент (id) из массива
            $id = array_shift($_POST);
            $this->qb->update('posts', $_POST, $id);
            header("Location: /admin");
        }else{
            //Удалить последний элемент из массива (дефолтное фото)
            array_pop($_POST);
            //Получить имя загруженной картинки
            $images = $this->ib->saveImagePost();
            //Добавить элемент к массиву
            $_POST['images'] = $images;
            //Изъять первый элемент (id) из массива
            $id = array_shift($_POST);
            $this->qb->update('posts', $_POST, $id);
            header("Location: /admin");
        }
    }

    public function deletePost($id){
        if (!$this->auth->hasAnyRole(\Delight\Auth\Role::ADMIN)){
            header("Location: /");
        }else{
            $this->qb->delete('posts',$id);
            header("Location: /admin");
        }
    }
}
