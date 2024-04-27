<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@mainPage');

Route::get('/log', 'PageController@logPage') -> name('login');
Route::get('/reg', 'PageController@regPage');

Route::post('/regcheck', 'PageController@regCheck');
Route::post('/logcheck', 'PageController@logCheck');

Route::get('/user', 'PageController@personal') -> name('user');