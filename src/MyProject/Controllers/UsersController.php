<?php

namespace MyProject\Controllers;

use InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\View\View;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Models\Users\UserActivationService;

class UsersController extends AbstractController
{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
                $user->save();
                $this->view->renderHtml('users/signUpSuccessful.php', ['user' => $user]);
                return;
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /FrameWork/www/');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }

    public function signUpSuccessful()
    {
        $this->view->renderHtml('users/signUpSuccessful.php');
    }
}