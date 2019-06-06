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

$router->group(['prefix' => 'academia'], function() use($router){
    $router->get('/', 'AcademiaController@showAll');
    $router->get('/{id}', 'AcademiaController@find');
    $router->post('/', 'AcademiaController@store');
    $router->delete('/{id}', 'AcademiaController@destroy');
    $router->post('/{id}', 'AcademiaController@edit');
});
$router->group(['prefix' => 'logIn'], function() use($router){
    $router->post('/', 'AuthController@authenticate');
});
$router->group(['prefix' => 'permiso'], function() use($router){
    $router->get('/', 'PermisoController@showAll');
    $router->get('/{id}', 'PermisoController@find');
    $router->post('/', 'PermisoController@store');
    $router->delete('/{id}', 'PermisoController@destroy');
    $router->post('/{id}', 'PermisoController@edit');
});

$router->group(['prefix' => 'materia'], function() use($router){
    $router->get('/', 'MateriaController@showAll');
    $router->get('/{id}', 'MateriaController@find');
    $router->post('/', 'MateriaController@store');
    $router->delete('/{id}', 'MateriaController@destroy');
    $router->post('/{id}', 'MateriaController@edit');
});

$router->group(['prefix' => 'periodo'], function() use($router){
    $router->get('/', 'PeriodoController@showAll');
    $router->get('/{id}', 'PeriodoController@find');
    $router->post('/', 'PeriodoController@store');
    $router->delete('/{id}', 'PeriodoController@destroy');
    $router->post('/{id}', 'PeriodoController@edit');
});

$router->group(['prefix' => 'user'], function() use($router){
    $router->get('/', 'UsuarioController@showAll');
    $router->get('/{id}', 'UsuarioController@find');
    $router->post('/', 'UsuarioController@store');
    $router->delete('/{id}', 'UsuarioController@destroy');
    $router->post('/{id}', 'UsuarioController@edit');
});

$router->group(['prefix' => 'rol'], function() use($router){
    $router->get('/', 'RolController@showAll');
    $router->get('/{id}', 'RolController@find');
    $router->post('/', 'RolController@store');
    $router->delete('/{id}', 'RolController@destroy');
    $router->post('/{id}', 'RolController@edit');
    $router->post('/{id}/permisos', 'RolController@editPermisos');
    $router->get('/{id}/permisos', 'RolController@permisos');
});