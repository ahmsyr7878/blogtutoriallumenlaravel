<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function($router){
    $router->post('posts','PostsController@createPost');
    $router->put('posts/{id}', 'PostsController@updatePost');
    $router->get('posts/{id}', 'PostsController@viewPost');
    $router->delete('posts/{id}', 'PostsController@deletePost');
    $router->get('posts', 'PostsController@index');

    $router->post('users','UsersController@create');
    $router->put('users/{id}', 'UsersController@edit');
    $router->get('users/{id}', 'UsersController@view');
    $router->delete('users/{id}', 'UsersController@delete');
    $router->get('users', 'UsersController@index');


});
