<?php

use Todo\Controller;
use Todo\Database;
use Todo\User;
use Todo\UserTodoItem;

class LoginController extends Controller
{
    public function display()
    {
        return $this->view('login');
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
}