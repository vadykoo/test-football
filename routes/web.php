<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::impersonate();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/teams', 'TeamController');
    Route::resource('/players', 'PlayerController');
    Route::resource('/groups', 'GroupController');
    Route::middleware('can:accessSuperAdmin')->group(function() {
        Route::resource('/users', 'UserController');
        Route::resource('/clubs', 'ClubController');
    });
});
