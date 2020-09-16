<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth' ], function(){

    Route::get('index', 'UsersController@index')->name('users.index');
    Route::get('create', 'UsersController@create')->name('users.create');
    Route::post('store', 'UsersController@store')->name('users.store');
    Route::get('show/{id}', 'UsersController@show')->name('users.show');
    Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('update/{id}', 'UsersController@update')->name('users.update');
    Route::post('destroy/{id}', 'UsersController@destroy')->name('users.destroy');

    //フォロー/フォローの解除
    Route::post('{id}/follow', 'UsersController@follow')->name('follow');
    Route::delete('{id}/unfollow', 'UsersController@unfollow')->name('unfollow');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
