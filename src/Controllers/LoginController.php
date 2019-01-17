<?php

use Todo\Controller;
use Todo\Database;
// REPLACE BELOW WITH LOGIN MODEL
use Todo\User;

class LoginController extends Controller
{
    public function display()
    {
        return $this->view('login');
    }

    public function login()
    {
      $result = User::login($_POST['username'], $_POST['password']);
      if ($result) {
        $this->redirect('/');
      } else {
        $this->view('login');
      }
    }

}

