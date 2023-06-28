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
 * Admin panel
 */
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('login', 'AuthenticateController@login')->name('login');
    Route::post('login', 'AuthenticateController@authenticate');

    Route::get('register', 'AuthenticateController@registerForm')->name('register');
    Route::post('register', 'AuthenticateController@store');
});

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');

    Route::get('coaches', 'CoachController@coachList');
    Route::get('coach/edit/{id}', 'CoachController@coachEdit');
    Route::get('coach/create', 'CoachController@coachCreate');
    Route::post('coach/delete', 'CoachController@coachDelete');
    Route::post('coach/save', 'CoachController@coachStore');

    Route::get('page', 'PageController@pageEdit');
    Route::post('page/save', 'PageController@pageStore');
    Route::post('page/image/delete', 'PageController@pageDeleteImage');
    Route::post('page/image/upload', 'PageController@pageUploadImage');

    Route::get('categories', 'CategoryController@categoryList');
    Route::get('category/edit/{id}', 'CategoryController@categoryEdit');
    Route::get('category/create', 'CategoryController@categoryCreate');
    Route::post('category/delete', 'CategoryController@categoryDelete');
    Route::post('category/save', 'CategoryController@categoryStore');

    Route::get('services', 'ServiceController@serviceList');
    Route::get('service/edit/{id}', 'ServiceController@serviceEdit');
    Route::get('service/create', 'ServiceController@serviceCreate');
    Route::post('service/delete', 'ServiceController@serviceDelete');
    Route::post('service/save', 'ServiceController@serviceStore');

    Route::get('season-tickets', 'SeasonTicketController@seasonTicketList');
    Route::get('season-ticket/edit/{id}', 'SeasonTicketController@seasonTicketEdit');
    Route::get('season-ticket/create', 'SeasonTicketController@seasonTicketCreate');
    Route::post('season-ticket/delete', 'SeasonTicketController@seasonTicketDelete');
    Route::post('season-ticket/save', 'SeasonTicketController@seasonTicketStore');

    Route::post('logout', 'LogoutController@perform')->name('logout');
});


/**
 * Post requests
 */
Route::post('/send-mail', 'ContactController@sendMail');
