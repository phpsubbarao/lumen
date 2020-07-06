<?php

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
	return "<h1>JWT with Lumen</h1>";
    return $router->app->version();
});

$router->post('foo', function () {
	print_r($_REQUEST);
    	return "Hello Post Method";
});

//$router->get('user/{id}', 'UserController@show');

$router->get('articles', 'ArticleController@showAll');


$router->group(['prefix' => 'api'], function($router){
    $router->get('articles', 'ArticleController@showAll');
    $router->get('articles/{id}', 'ArticleController@showOneArticles');
    $router->post('articles', 'ArticleController@create');
    $router->put('articles/{id}', 'ArticleController@update');
    $router->delete('articles/{id}', 'ArticleController@delete');

     // Matches "/api/register
    $router->post('register', 'AuthController@register');

      // Matches "/api/login
     $router->post('login', 'AuthController@login');

 // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1 
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');     
});

