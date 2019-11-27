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

Route::get('/', 'HomeController@welcome');

Auth::routes();

//Home Routes
Route::get('/home', 'HomeController@welcome')->name('home');

//List Routes
Route::get('/list', 'ListController@list')->name('list');
Route::get('/list/{id}','ListController@listId');
Route::get('/list?id={id}','ListController@listId');

//Edit Routes
Route::get('/edit', 'EditController@edit')->name('edit');
Route::get('/edit/{id}','EditController@editId');
Route::post('edited/{id}', 'EditController@editFeed');
Route::get('/delete/{id}', 'EditController@deleteFeed')->name('delete');

//Add Routes
Route::get('add', 'AddController@add')->name('add');
Route::post('add', 'AddController@addFeed')->name('add');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');