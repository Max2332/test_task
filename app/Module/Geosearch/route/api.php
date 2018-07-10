<?php


$router->middleware(['api'])->group(function () use ($router) {

    $router->get('/search', 'GeoSearchController@getAction')->name('поиск');

});


