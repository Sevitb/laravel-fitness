<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Get requests
 */
Route::get('/', 'HomeController@index');

Route::get('coach/{id?}', 'CoachController@getCoach');

Route::get('category/{id}', 'CategoryController@getCategory');

/**
 * Post requests
 */
Route::post('/send-mail', 'ContactController@sendMail');
