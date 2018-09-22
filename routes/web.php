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
    return $router->app->version();
});

$router->get('api/list','MyFirstAPIController@list_items');
$router->get('api/get/{id}','MyFirstAPIController@get_item');
$router->post('api/create','MyFirstAPIController@create_item');
$router->post('api/update/{id}','MyFirstAPIController@update_item');
$router->delete('api/delete/{id}','MyFirstAPIController@delete_item');