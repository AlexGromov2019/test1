<?php
namespace App\controllers;

use App\models\Comments;
use App\models\QueryBuilder;
use App\models\ImageBuilder;
use App\models\TimeBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use Exception;
use Tamtamchik\SimpleFlash\Flash;

class HomeController{

    private $templates;
    private $auth;
    private $qb;
    private $flash;
    private $ib;
    private $comments;
    private $tb;

    private $data;
    private $selectAll;
    private $paginator;

    private $getOne;
    private $pageViewCount;
    private $viewsPost;

    public function __construct(QueryBuilder $qb, Engine $engine,
                                Auth $auth, Flash $flash,
                                ImageBuilder $ib, Comments $comments,
                                TimeBuilder $timeBuilder)
    {
        $this->qb = $qb;
        $this->templates = $engine;
        $this->auth = $auth;
        $this->flash = $flash;
        $this->ib = $ib;
        $this->comments = $comments;
        $this->tb = $timeBuilder;

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

    public function index(){

        $this->auth->getEmail();

        //Получаю данные из метода getAll() в QueryBuilder
        $this->data = $this->qb->getAll('posts','3');
        //Извлекаю отдельно вывод постов
        $this->selectAll = $this->data['items'];
        //Извлекаю отдельно пагинацию
        $this->paginator = $this->data['paginator'];
        //Вывожу шаблон страницы и передаю ей данные
        echo $this->templates->render('homepage', ['arrayItems' => $this->selectAll, 'paginator' => $this->paginator]);
    }

    public function singlePage($id){

        /*//Получаем номер текущей записи
        $select = $this->qf->newSelect();
        $select->cols(['COUNT(id)'])
            ->from('posts')
            ->where('id < :id')
            ->bindValues(['id' => $id])
            ->limit(1);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $numberCount = $sth->fetch(PDO::FETCH_NUM);

        //Предыдущая запись
        $select2 = $this->qf->newSelect();
        $select2->cols(['*'])
            ->from('posts')
            ->where('id < :id')
            ->bindValues(['id' => $id])
            ->limit(1)
            ->offset($numberCount[0] - 1);
        $sth2 = $this->pdo->prepare($select2->getStatement());
        $sth2->execute($select2->getBindValues());
        $resNext  = $sth2->fetchAll(PDO::FETCH_ASSOC);

        //Следующая запись
        $select2 = $this->qf->newSelect();
        $select2->cols(['*'])
            ->from('posts')
            ->where('id > :id')
            ->bindValues(['id' => $id])
            ->limit(1);
            //->offset($numberCount[0] - 1);
        $sth2 = $this->pdo->prepare($select2->getStatement());
        $sth2->execute($select2->getBindValues());
        $resNext  = $sth2->fetchAll(PDO::FETCH_ASSOC);*/

        //Следующая запись
        $next = $this->qb->nextPost($id);
        //Предыдущая запись
        $prev = $this->qb->previousPost($id);

        $this->getOne = $this->qb->getOne('posts', $id);
        //Счетчик Просмотров страницы
        foreach ($this->getOne as $items){
            $this->viewsPost = $items['views_post'] + 1;
            $this->pageViewCount = $this->qb->update('posts', [
                'views_post' => $this->viewsPost,
            ], $id);
        }
        $userInfo = $this->qb->getOneUser('users', $this->getOne[0]['author']);
        //Получить кол-во комментариев
        $countComments = $this->qb->countRecordsInTable('comments', $this->getOne[0]['id']);
        //Передать полученные из БД данные -> в шаблон и вывести шаблон
        echo $this->templates->render('singlepage', ['getOnePost' => $this->getOne,
            'userInfo' => $userInfo, 'comments' => $this->comments,
            'countComments' => $countComments, 'time' => $this->tb,
            'next' => $next, 'prev' => $prev]);
    }

    public function Category($namecategory){
        //Получить данные из метода getAllByCategory() в QueryBuilder
        $this->data = $this->qb->getAllByCategory('posts', $namecategory);
        //Извлекаю отдельно вывод постов  в категории
        $this->selectAll = $this->data['items'];
        //Извлекаю отдельно пагинацию
        $this->paginator = $this->data['paginator'];
        //Передать полученные из БД данные -> в шаблон и вывести этот шаблон
        echo $this->templates->render('postsbycategory', ['arrayItems' => $this->selectAll, 'paginator' => $this->paginator]);
    }

    public function addComment(){
        $this->qb->insert('comments',$_POST);
        $post_id = $_POST['post_id'];
        header("Location: /page/$post_id#commentyakor");
    }

    public function error404(){
        echo $this->templates->render('error404');
    }
}
