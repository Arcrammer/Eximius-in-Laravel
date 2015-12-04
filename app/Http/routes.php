<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication controllers
Route::controllers([
  'auth' => '\Eximius\Http\Controllers\Auth\AuthController',
  'password' => '\Eximius\Http\Controllers\Auth\PasswordController'
]);

// Everything else
Route::get('/', 'Welcome@index');
Route::get('/profile', 'User@profile');
Route::post('/profile', 'User@update');
Route::get('/listings', 'Listings@all');
Route::get('/listings/create', 'Listings@create');
Route::post('/listings/create', 'Listings@persist');
Route::get('/messages', 'Messages@all');
Route::get('/messages/compose', 'Messages@compose');
