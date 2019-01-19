<?php

//Global todo routes
$router->get('', 'TodoController@get');
$router->post('todos/complete', 'TodoController@complete');
$router->post('todos/incomplete', 'TodoController@incomplete');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@update');
$router->get('todos/{id}/delete', 'TodoController@delete');
$router->post('todos/toggle-all', 'TodoController@toggle');
$router->post('todos/clear-completed', 'TodoController@clear');

//Login Routes
$router->get('displayLogin', 'LoginController@displayLogin');
$router->get('displayRegister', 'LoginController@displayRegister');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');
$router->post('register', 'LoginController@register');
$router->post('user', 'LoginController@user');

// User todo routes
$router->get('usertodos/{userId}', 'UserTodoController@get');
$router->post('usertodos/{userId}/complete', 'UserTodoController@complete');
$router->post('usertodos/{userId}/incomplete', 'UserTodoController@incomplete');
$router->post('usertodos/{userId}/add', 'UserTodoController@add');
$router->patch('usertodos/{userId}/{id}', 'UserTodoController@update');
$router->get('usertodos/{userId}/{id}/delete', 'UserTodoController@delete');
$router->post('usertodos/{userId}/toggle-all', 'UserTodoController@toggle');
$router->post('usertodos/{userId}/clear-completed', 'UserTodoController@clear');