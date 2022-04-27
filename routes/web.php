<?php

use Illuminate\Support\Facades\Route;
// actually auto imported -> but not getting undfined er in Auth -> problem of VScode
use Illuminate\Support\Facades\Auth;

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
    return redirect(config('app.frontend_url'));
});

// all auth routes -> to remove registration 4 others ['register' => false]
Auth::routes();

Route::prefix('admin')
      ->namespace('Admin')
      ->middleware('auth')
      // ->name('admin.')
      ->group(function () {
        Route::get('/', 'VideoController@index')->name('home');
        Route::get('/show/{slug}', 'VideoController@show')->name('show');
        Route::get('/edit/{slug}', 'VideoController@edit')->name('edit');
        Route::patch('/update/{id}', 'VideoController@update')->name('update');
        Route::get('/create', 'VideoController@create')->name('create');
        Route::post('/store', 'VideoController@store')->name('store');
        Route::delete('/delete/{id}', 'VideoController@destroy')->name('delete');
      });