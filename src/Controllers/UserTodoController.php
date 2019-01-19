<?php

use Todo\Controller;
use Todo\Database;
use Todo\UserTodoItem;

class UserTodoController extends Controller
{
    public function get($urlParams)
    {
        session_start();
        if(isset($_SESSION['userId'])) {
        $userId = $urlParams['userId'];
        $userTodos = UserTodoItem::findAllMatches($userId);
        return $this->view('user', ['userTodos' => $userTodos]);
    } else {
        echo "unathorized entry";
    }
}

public function add($urlParams)
{
    $userId = $urlParams['userId'];
    $body = filter_body();
    $result = UserTodoItem::createTodo($body['title'], $userId);
    if ($result) {
        $this->redirect('/usertodos/' . $userId);
    }
}

public function update($urlParams)
{
    $body = filter_body(); // gives you the body of the request (the "envelope" contents)
    $title = $body['title'];
    $todoId = $urlParams['id']; // the id of the todo we're trying to update
    $userId = $urlParams['userId'];
    $completed = isset($body['status']) ? 1 : 0; // whether or not the todo has been checked or not
        $isComplete = ($completed === 1) ? "true" : "false";
        $result = UserTodoItem::updateTodo($todoId, $title, $isComplete);
        
        if ($result) {
            $this->redirect('/usertodos/' . $userId);
        }
    }
    
    public function delete($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        $userId = $urlParams['userId'];
        
        $result = UserTodoItem::deleteTodo($todoId);
        
        if ($result) {
            $this->redirect('/usertodos/' . $userId);
        }
    }
      
    /**
     * OPTIONAL Bonus round!
     *
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */
    public function toggle($urlParams)
    {
        $userId = $urlParams['userId'];
        $completed = $_POST['toggle'];
        $result = UserTodoItem::toggleTodos($completed, $userId);
        if ($result) {
            $this->redirect('/usertodos/' . $userId);
        }
    }

    public function complete()
    {
        $userTodos = UserTodoItem::filterComplete();
        return $this->view('user', ['userTodos' => $userTodos]);
    }
    public function incomplete()
    {
        $userTodos = UserTodoItem::filterIncomplete();
        return $this->view('user', ['userTodos' => $userTodos]);
    }
      
    public function clear($urlParams)
    {
        $userId = $urlParams['userId'];
        $result = UserTodoItem::clearCompleted($userId);
        if ($result) {
            $this->redirect('/usertodos/' . $userId);
        }
    }
}
