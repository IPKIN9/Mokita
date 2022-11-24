<?php
$router->group(['prefix' => 'v1/roles'], function () use ($router) {
    $router->get('/', ['uses' => 'RoleController@getRole']);
});

$router->group(['prefix' => 'v1/dashboard', 'middleware' => ['auth', 'scope:crud-list,see-list']], function () use ($router) {
    $router->get('/', ['uses' => 'DashboardController@index']);
});

$router->group(['prefix' => 'v1/hakim', 'middleware' => ['auth', 'scope:crud-list']], function () use ($router) {
    $router->get('/', ['uses' => 'HakimController@getData']);
    $router->get('/{id}', ['uses' => 'HakimController@getById']);
    $router->post('/', ['uses' => 'HakimController@upsert']);
    $router->delete('/{id}', ['uses' => 'HakimController@delete']);
});

$router->group(['prefix' => 'v1/client', 'middleware' => ['auth', 'scope:crud-list']], function () use ($router) {
    $router->get('/', ['uses' => 'ClientController@getData']);
    $router->get('/{id}', ['uses' => 'ClientController@getById']);
    $router->post('/', ['uses' => 'ClientController@upsert']);
    $router->delete('/{id}', ['uses' => 'ClientController@delete']);
});

$router->group(['prefix' => 'v1/jadwal_sidang', 'middleware' => ['auth', 'scope:crud-list,see-list']], function () use ($router) {
    $router->get('/', ['uses' => 'JadwalSidangController@getData']);
    $router->get('/{id}', ['uses' => 'JadwalSidangController@getById']);
    $router->post('/', ['uses' => 'JadwalSidangController@upsert']);
    $router->delete('/{id}', ['uses' => 'JadwalSidangController@delete']);
});

$router->group(['prefix' => 'v1/gugatan', 'middleware' => ['auth', 'scope:crud-list']], function () use ($router) {
    $router->get('/', ['uses' => 'GugatanController@getData']);
    $router->get('/{id}', ['uses' => 'GugatanController@getById']);
    $router->post('/', ['uses' => 'GugatanController@upsert']);
    $router->delete('/{id}', ['uses' => 'GugatanController@delete']);
});

$router->group(['prefix' => 'v1/anak', 'middleware' => ['auth', 'scope:crud-list']], function () use ($router) {
    $router->get('/', ['uses' => 'AnakController@getData']);
    $router->get('/{id}', ['uses' => 'AnakController@getById']);
    $router->post('/', ['uses' => 'AnakController@upsert']);
    $router->delete('/{id}', ['uses' => 'AnakController@delete']);
});

$router->group(['prefix' => 'v1/perkara', 'middleware' => ['auth', 'scope:crud-list,see-list']], function () use ($router) {
    $router->get('/', ['uses' => 'PerkaraController@getData']);
    $router->get('/{id}', ['uses' => 'PerkaraController@getById']);
    $router->post('/', ['uses' => 'PerkaraController@upsert']);
    $router->delete('/{id}', ['uses' => 'PerkaraController@delete']);
});
