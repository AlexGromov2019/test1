<?php
namespace App\controllers;

use App\models\AuthBuilder;
use App\models\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;

class AuthController{

    private $templates;
    private $auth;
    private $qb;
    private $ab;

    public function __construct(QueryBuilder $qb, Engine $engine, Auth $auth, AuthBuilder $authBuilder)
    {
        $this->qb = $qb;
        $this->templates = $engine;
        $this->auth = $auth;
        $this->ab = $authBuilder;

        $this->templates->addFolder('admin', '../app/views/admin');
        $getUserAvatar = $this->qb->getOne('users', $this->auth->getUserId());
        $getPopularPosts = $this->qb->getPopular('posts', 'views_post');
        $latestPosts = $this->qb->getAll('posts', '3');
        $this->templates->addData(
            ['auth' => $this->auth,
                'getUserAvatar' => $getUserAvatar,
                'getPopularPosts' => $getPopularPosts,
                'latestPosts' => $latestPosts],
            ['profile-user', 'edit-profile', 'layout',
                'admin::admin-layout', 'admin::admin-add-post-form',
                'admin::admin-edit-post-form', 'singlepage']);
    }

    public function registrationForm(){
        echo $this->templates->render('registration-form');
    }

    public function registration(){
        $this->ab->registration();
    }

    public function emailVerification(){
        $this->ab->emailVerification();
    }

    public function loginForm(){
        echo $this->templates->render('login-form');
    }

    public function login(){
        $this->ab->login();
    }

    public function logout(){
        $this->auth->logOut();
        header("Location: /");
    }

    public function editAvatar(){
        $avatar = $this->ab->editAvatar();
        echo $this->templates->render('edit-profile', ['avatar' => $avatar]);
    }

    public function updateAvatar(){
        $this->ab->updateAvatar();
    }
}
