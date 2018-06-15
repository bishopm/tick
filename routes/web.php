<?php
$router->get('projects', ['as' => 'projects.index', 'uses' => 'ProjectsController@index']);
$router->get('projects/{project}', ['as' => 'projects.show', 'uses' => 'ProjectsController@show']);
$router->post('projects', ['as' => 'projects.store', 'uses' => 'ProjectsController@store']);
$router->put('projects/{project}', ['as' => 'projects.update', 'uses' => 'ProjectsController@update']);
$router->delete('projects/{project}', ['as' => 'projects.destroy', 'uses' => 'ProjectsController@destroy']);

// Tasks
$router->get('tasks', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
$router->get('tasks/{task}', ['as' => 'tasks.show', 'uses' => 'TasksController@show']);
$router->post('tasks', ['as' => 'tasks.store', 'uses' => 'TasksController@store']);
$router->put('tasks/{task}', ['as' => 'tasks.update', 'uses' => 'TasksController@update']);
$router->delete('tasks/{task}', ['as' => 'tasks.destroy', 'uses' => 'TasksController@destroy']);
