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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api'], function () use ($app) {
    // Matches "/api/register
    $app->post('register', 'AuthController@register');
    // Matches "/api/login
    $app->post('login', 'AuthController@login');

    // Matches "/api/profile
    $app->get('profile', 'UserController@profile');

    // Matches "/api/users/1
    //get one user by id
    $app->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $app->get('users', 'UserController@allUsers');
});
