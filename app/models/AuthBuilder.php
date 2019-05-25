<?php


namespace App\models;

use Exception;
use Delight\Auth\Auth;
use Tamtamchik\SimpleFlash\Flash;
use App\models\ImageBuilder;
use App\models\QueryBuilder;

class AuthBuilder
{
    private $auth;
    private $flash;
    private $ib;
    private $qb;

    public function __construct(Flash $flash, Auth $auth, ImageBuilder $imageBuilder, QueryBuilder $queryBuilder)
    {
        $this->flash = $flash;
        $this->auth = $auth;
        $this->ib = $imageBuilder;
        $this->qb = $queryBuilder;
    }

    public function registration(){
        try {
            //Пароли совпадают?
            try{
                if($_POST['password'] !== $_POST['repassword']){
                    throw new Exception("Passwords do not match");
                }
                else{
                    $userId = $this->auth->register($_POST['email'], $_POST['password'],
                        $_POST['username'], function ($selector, $token) {
                            $urlencodeSelector = urlencode($selector);
                            $urlencodeToken = urlencode($token);
                            header("Location: /verification?selector=$urlencodeSelector&token=$urlencodeToken");
                        });
                }
            }catch (Exception $exception){
                $this->flash->error($exception->getMessage());
                header('Location: /registration-form');
            }

            //Назначаем роль Сотрудника
            $this->auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::CONTRIBUTOR);
            //Загружаем картинку
            $avatar = $this->ib->saveImageAvatar();
            $this->qb->update('users', ['avatar' => $avatar], $userId);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            $this->flash->error('Invalid email address');
            header('Location: /registration-form');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            $this->flash->error('User already exists');
            header('Location: /registration-form');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $this->flash->error('Invalid password');
            header('Location: /registration-form');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $this->flash->error('Too many requests');
            header('Location: /registration-form');
        }
    }

    public function emailVerification(){
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);
            $this->flash->success('Email address has been verified');
            header('Location: /login-form');

        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            $this->flash->error('Token expired');
            header('Location: /registration-form');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            $this->flash->error('Email address already exists');
            header('Location: /registration-form');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $this->flash->error('Too many requests');
            header('Location: /registration-form');
        }
    }

    public function login(){
        try {
            $this->auth->login($_POST['email'], $_POST['password']);
            $this->flash->success('User is logged in');
            header('Location: /');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            $this->flash->error('Wrong email address');
            header('Location: /login-form');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            $this->flash->error('Wrong password');
            header('Location: /login-form');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $this->flash->error('Email not verified');
            header('Location: /login-form');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            $this->flash->error('Too many requests');
            header('Location: /login-form');
        }
    }

    public function editAvatar(){
        //Если не залогинен -> редирект на главную
        if(!$this->auth->isLoggedIn()){
            header('Location: /');
        }
        $profileInfo = $this->qb->getOne('users',$this->auth->getUserId());
        $avatar = $profileInfo[0]['avatar'];
        return $avatar;
    }

    public function updateAvatar(){
        // Если картинка выбрана -> добавляем ее в БД
        if($_FILES['pictures']['name']){
            $avatar = $this->ib->saveImageAvatar();
            $_POST['avatar'] = $avatar;
            $this->qb->update('users', $_POST, $_POST['id']);
            header('Location: /edit-profile');
        }else{
            // Если не выбрана -> обновляем текущую картинку
            $profileInfo = $this->qb->getOne('users',$this->auth->getUserId());
            $avatar = $profileInfo[0]['avatar'];
            $_POST['avatar'] = $avatar;
            $this->qb->update('users', $_POST, $_POST['id']);
            header('Location: /edit-profile');

        }
    }
}
