<?php

use Todo\Controller;
use Todo\Database;
use Todo\User;
use Todo\UserTodoItem;

class LoginController extends Controller
{
    public function displayLogin()
    {
        return $this->view('login');
    }

    public function displayRegister()
    {
        return $this->view('register');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        $this->redirect('/');
    }

    public function login()
    {
        $result = User::login($_POST['username'], $_POST['password']);
        if ($result[1]) {
            session_start();
            $_SESSION['userId'] = $result[0][0]['id'];
            $userTodos = UserTodoItem::findAllMatches($_SESSION['userId']);
            $this->redirect('/usertodos/' . $_SESSION['userId']);
            
        } else {
            $this->view('login');
         }
    }

    public function register()
    {
        $result = User::register($_POST['username'], $_POST['password']);
        if ($result !== null) {
            session_start();
            $_SESSION['userId'] = $result;
            $userTodos = UserTodoItem::findAllMatches($_SESSION['userId']);
            $this->redirect('/usertodos/' . $_SESSION['userId']);
        } else {
            echo "Registration failed";
         }
    }
}