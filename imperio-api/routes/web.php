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
    return 'Primeira API REST com Lumen... ' . $router->app->version();
});



$router->group(['prefix' => 'clientes'], function() use($router){

    $router->get('/', 'ClientesController@index');
    $router->post('/', 'ClientesController@store');
    $router->get('/{id}', 'ClientesController@show');
    $router->put('/{id}', 'ClientesController@update');
    $router->delete('/{id}', 'ClientesController@destroy');

});

$router->group(['prefix' => 'pets'], function() use($router){

    $router->get('/', 'PetsController@index');
    $router->post('/', 'PetsController@store');
    $router->get('/{id}', 'PetsController@show');
    $router->put('/{id}', 'PetsController@update');
    $router->delete('/{id}', 'PetsController@destroy');

});

$router->group(['prefix' => 'status'], function() use($router){

    $router->get('/', 'StatusController@index');

});

$router->group(['prefix' => 'servicos'], function() use($router){

    $router->get('/', 'ServicosController@index');
    $router->post('', 'ServicosController@store');
    $router->get('/{id}', 'ServicosController@show');
    $router->patch('/{id}', 'ServicosController@update');
    $router->delete('/{id}', 'ServicosController@destroy');

});
$router->group(['prefix' => 'agendamentos'], function() use($router){

    $router->get('/', 'AgendamentosController@index');
    $router->post('', 'AgendamentosController@store');
    $router->get('/{id}', 'AgendamentosController@show');
    $router->put('/{id}', 'AgendamentosController@update');
    $router->delete('/{id}', 'AgendamentosController@destroy');

});

$router->group(['prefix' => 'servtipos'], function() use($router){

    $router->get('/', 'ServicosTipoController@index');

});
