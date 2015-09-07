<?php

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('login', ['as' => 'login', 'uses' =>'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' =>'AuthController@logout']);
