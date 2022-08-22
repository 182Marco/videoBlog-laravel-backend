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
        Route::get('/contacts', 'ContactController@index')->name('contacts');
        Route::get('/contact/{id}', 'ContactController@show')->name('contact');
        Route::get('/contact/delete/{id}', 'ContactController@destroy')->name('deleteContact');
        Route::get('/categories', 'CategoryController@index')->name('categories');
        Route::get('/categories/show/{slug}', 'CategoryController@show')->name('showCategory');
        Route::get('/categories/edit/{slug}', 'CategoryController@edit')->name('editCategory');
        Route::patch('/categories/update/{id}', 'CategoryController@update')->name('updateCategory');
        Route::get('/categories/create', 'CategoryController@create')->name('createCategory');
        Route::post('/categories/store', 'CategoryController@store')->name('storeCategory');
        Route::delete('/categories/delete/{id}', 'CategoryController@destroy')->name('deleteCategory');
      });