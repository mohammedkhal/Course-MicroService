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

$router->group(['namespace' => 'V1\Course', 'prefix' => 'courses'], function () use ($router) {
    $router->get('/', 'IndexController@index');
    $router->post('/', 'CreateController@store');
    $router->get('/{coures_uuid}', 'IndexController@show');
    $router->put('/{coures_uuid}', 'EditController@update');
    $router->delete('/{coures_uuid}', 'EditController@destroy');
});
