<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1/hakim'] , function() use ($router) {
    $router->get('/', ['uses' => 'HakimController@getData']);
});
