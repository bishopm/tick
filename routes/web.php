<?php
// Projects
$router->get('myprojects/{id}', ['as' => 'projects.index', 'uses' => 'ProjectsController@index']);
$router->get('someday/{id}', ['as' => 'projects.someday', 'uses' => 'ProjectsController@someday']);
$router->get('projects/{project}', ['as' => 'projects.show', 'uses' => 'ProjectsController@show']);
$router->post('projects', ['as' => 'projects.store', 'uses' => 'ProjectsController@store']);
$router->post('projects/{project}', ['as' => 'projects.update', 'uses' => 'ProjectsController@update']);
$router->delete('projects/{project}', ['as' => 'projects.destroy', 'uses' => 'ProjectsController@destroy']);

// Tasks
$router->get('mytasks/{user}', ['as' => 'tasks.mytasks', 'uses' => 'TasksController@mytasks']);
$router->get('myunallocated/{user}', ['as' => 'tasks.myunallocated', 'uses' => 'TasksController@myunallocated']);
$router->get('tasks', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
$router->get('tasks/{task}', ['as' => 'tasks.show', 'uses' => 'TasksController@show']);
$router->get('tasks/{task}/toggle', ['as' => 'tasks.show', 'uses' => 'TasksController@toggle']);
$router->post('tasks', ['as' => 'tasks.store', 'uses' => 'TasksController@store']);
$router->post('tasks/{task}', ['as' => 'tasks.update', 'uses' => 'TasksController@update']);
$router->post('deletetask', ['as' => 'tasks.destroy', 'uses' => 'TasksController@destroy']);

// Users
$router->get('team/{user}', ['as' => 'users.team', 'uses' => 'UsersController@team']);
$router->post('login', ['as' => 'users.login', 'uses' => 'UsersController@login']);
$router->get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
$router->get('users/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
$router->post('users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
$router->post('users/{user}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
$router->delete('users/{user}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
