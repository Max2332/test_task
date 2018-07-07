<?php


$router->middleware(['api'])->group(function () use ($router) {

    $router->get('/search', 'SearchController@getAction')->name('поиск');

});


