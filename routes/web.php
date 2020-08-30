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


$router->get('/', 'TmdbController@index');
$router->get('/show/{id}', 'TmdbController@show');
$router->get('/search', 'TmdbController@search');
$router->get('/genre/{id}', 'TmdbController@genre');
