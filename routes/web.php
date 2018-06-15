<?php
// Projects
$router->get('projects', ['as' => 'projects.index', 'uses' => 'ProjectsController@index']);
$router->get('projects/{project}', ['as' => 'projects.show', 'uses' => 'ProjectsController@show']);
$router->post('projects', ['as' => 'projects.store', 'uses' => 'ProjectsController@store']);
$router->put('projects/{project}', ['as' => 'projects.update', 'uses' => 'ProjectsController@update']);
$router->delete('projects/{project}', ['as' => 'projects.destroy', 'uses' => 'ProjectsController@destroy']);

// Tasks
$router->get('tasks', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
$router->get('tasks/{task}', ['as' => 'tasks.show', 'uses' => 'TasksController@show']);
$router->get('tasks/{task}/toggle', ['as' => 'tasks.show', 'uses' => 'TasksController@toggle']);
$router->post('tasks', ['as' => 'tasks.store', 'uses' => 'TasksController@store']);
$router->put('tasks/{task}', ['as' => 'tasks.update', 'uses' => 'TasksController@update']);
$router->delete('tasks/{task}', ['as' => 'tasks.destroy', 'uses' => 'TasksController@destroy']);

// Users
$router->get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
$router->get('users/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
$router->post('users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
$router->put('users/{user}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
$router->delete('users/{user}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
