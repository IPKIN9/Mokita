<?php

$router->get('/', function () use ($router) {
    return view('BaseLayout');
});

$router->group(['prefix' => 'v1/hakim', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', ['uses' => 'HakimController@getData']);
    $router->get('/{id}', ['uses' => 'HakimController@getById']);
    $router->post('/', ['uses' => 'HakimController@upsert']);
    $router->delete('/{id}', ['uses' => 'HakimController@delete']);
});

$router->group(['prefix' => 'v1/client'], function () use ($router) {
    $router->get('/', ['uses' => 'ClientController@getData']);
    $router->get('/{id}', ['uses' => 'ClientController@getById']);
    $router->post('/', ['uses' => 'ClientController@upsert']);
    $router->delete('/{id}', ['uses' => 'ClientController@delete']);
});

$router->group(['prefix' => 'v1/jadwal_sidang'], function () use ($router) {
    $router->get('/', ['uses' => 'JadwalSidangController@getData']);
    $router->get('/{id}', ['uses' => 'JadwalSidangController@getById']);
    $router->post('/', ['uses' => 'JadwalSidangController@upsert']);
    $router->delete('/{id}', ['uses' => 'JadwalSidangController@delete']);
});

$router->group(['prefix' => 'v1/gugatan'], function () use ($router) {
    $router->get('/', ['uses' => 'GugatanController@getData']);
    $router->get('/{id}', ['uses' => 'GugatanController@getById']);
    $router->post('/', ['uses' => 'GugatanController@upsert']);
    $router->delete('/{id}', ['uses' => 'GugatanController@delete']);
});

$router->group(['prefix' => 'v1/anak'], function () use ($router) {
    $router->get('/', ['uses' => 'AnakController@getData']);
    $router->get('/{id}', ['uses' => 'AnakController@getById']);
    $router->post('/', ['uses' => 'AnakController@upsert']);
    $router->delete('/{id}', ['uses' => 'AnakController@delete']);
});

$router->group(['prefix' => 'v1/perkara'], function () use ($router) {
    $router->get('/', ['uses' => 'PerkaraController@getData']);
    $router->get('/{id}', ['uses' => 'PerkaraController@getById']);
    $router->post('/', ['uses' => 'PerkaraController@upsert']);
    $router->delete('/{id}', ['uses' => 'PerkaraController@delete']);
});
