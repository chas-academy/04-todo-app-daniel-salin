<?php

$router->get('', 'TodoController@get');
$router->post('todos/complete', 'TodoController@complete');
$router->post('todos/incomplete', 'TodoController@incomplete');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@update');
$router->get('todos/{id}/delete', 'TodoController@delete');
$router->post('todos/toggle-all', 'TodoController@toggle');
$router->post('todos/clear-completed', 'TodoController@clear');

//Login Routes
$router->get('display', 'LoginController@display');
$router->post('login', 'LoginController@login');