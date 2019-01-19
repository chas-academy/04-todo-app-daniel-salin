<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller
{
    public function get()
    {
        // MOVE TO LOGOUT
        session_start();
        session_destroy();
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
            $this->redirect('/');
        }
    }
      
    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $title = $body['title'];
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 1 : 0; // whether or not the todo has been checked or not
        $isComplete = ($completed === 1) ? "true" : "false";
        $result = TodoItem::updateTodo($todoId, $title, $isComplete);
        
        if ($result) {
            $this->redirect('/');
        }
    }
      
    public function delete($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        
        $result = TodoItem::deleteTodo($todoId);
        
        if ($result) {
            $this->redirect('/');
        }
    }
      
    /**
     * OPTIONAL Bonus round!
     *
     * The two methods below are optional, feel free to try and complete them
     * if you're aiming for a higher grade.
     */
    public function toggle()
    {
        $completed = $_POST['toggle'];
        $result = TodoItem::toggleTodos($completed);
        if ($result) {
            $this->redirect('/');
        }
    }

    public function complete()
    {
        $todos = TodoItem::filterComplete();
        return $this->view('index', ['todos' => $todos]);
    }
    public function incomplete()
    {
        $todos = TodoItem::filterIncomplete();
        return $this->view('index', ['todos' => $todos]);
    }
      
    public function clear()
    {
        $result = TodoItem::clearCompletedTodos();
        if ($result) {
            $this->redirect('/');
        }
    }
}
