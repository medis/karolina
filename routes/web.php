<?php

Route::get('/', 'PageController@home')->name('index');
Route::get('/about', 'PageController@about')->name('about');

Route::get('/work', 'WorkController@index');
Route::get('/work/{work}', 'WorkController@show')->name('work');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
