<?php

$app->get('/', function () {
    return 'Hello World';
});

$router->group(function () use ($router) {
    // Projects
    $router->get('projects', ['as' => 'projects.index', 'uses' => 'App\Http\Controllers\ProjectsController@index']);
    $router->get('projects/{project}', ['as' => 'projects.show', 'uses' => 'App\Http\Controllers\ProjectsController@show']);
    $router->post('projects', ['as' => 'projects.store', 'uses' => 'App\Http\Controllers\ProjectsController@store']);
    $router->put('projects/{project}', ['as' => 'projects.update', 'uses' => 'App\Http\Controllers\ProjectsController@update']);
    $router->delete('projects/{project}', ['as' => 'projects.destroy', 'uses' => 'App\Http\Controllers\ProjectsController@destroy']);

    // Tasks
    $router->get('tasks', ['as' => 'tasks.index', 'uses' => 'App\Http\Controllers\TasksController@index']);
    $router->get('tasks/{task}', ['as' => 'tasks.show', 'uses' => 'App\Http\Controllers\TasksController@show']);
    $router->post('tasks', ['as' => 'tasks.store', 'uses' => 'App\Http\Controllers\TasksController@store']);
    $router->put('tasks/{task}', ['as' => 'tasks.update', 'uses' => 'App\Http\Controllers\TasksController@update']);
    $router->delete('tasks/{task}', ['as' => 'tasks.destroy', 'uses' => 'App\Http\Controllers\TasksController@destroy']);
});
