<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1/hakim'] , function() use ($router) {
    $router->get('/', ['uses' => 'HakimController@getData']);
    $router->get('/{id}', ['uses' => 'HakimController@getById']);
    $router->post('/', ['uses' => 'HakimController@upsert']);
    $router->delete('/{id}', ['uses' => 'HakimController@delete']);
});

$router->group(['prefix' => 'v1/client'] , function() use ($router) {
    $router->get('/', ['uses' => 'ClientController@getData']);
    $router->get('/{id}', ['uses' => 'ClientController@getById']);
    $router->post('/', ['uses' => 'ClientController@upsert']);
    $router->delete('/{id}', ['uses' => 'ClientController@delete']);
});

$router->group(['prefix' => 'v1/jadwal_sidang'] , function() use ($router) {
    $router->get('/', ['uses' => 'JadwalSidangController@getData']);
    $router->get('/{id}', ['uses' => 'JadwalSidangController@getById']);
    $router->post('/', ['uses' => 'JadwalSidangController@upsert']);
    $router->delete('/{id}', ['uses' => 'JadwalSidangController@delete']);
});

$router->group(['prefix' => 'v1/gugatan'] , function() use ($router) {
    $router->get('/', ['uses' => 'GugatanController@getData']);
    $router->get('/{id}', ['uses' => 'GugatanController@getById']);
    $router->post('/', ['uses' => 'GugatanController@upsert']);
    $router->delete('/{id}', ['uses' => 'GugatanController@delete']);
});
