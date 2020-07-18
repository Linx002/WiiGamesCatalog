<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contactus', function () {
    return view('contactus');
});

//admin games

Route::get('/admin/games', 'ProductController@Index');

Route::get('/admin/games/create', 'ProductController@Create');

Route::post('/admin/games/create', 'ProductController@Store');

Route::get('/admin/games/delete/{id}', 'ProductController@Delete');

Route::delete('/admin/games/delete', 'ProductController@Remove');

Route::get('/admin/games/edit/{id}', 'ProductController@Edit');

Route::post('/admin/games/edit', 'ProductController@Update');

Route::get('/admin/games/{id}', 'ProductController@Show');

// gamestore

Route::get('/games', 'ProductController@GameStore') -> name('GameStore');

Route::get('/games/{id}', 'ProductController@Details');

//Tests

Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
