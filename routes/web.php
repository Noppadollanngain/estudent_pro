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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'AdminController@indexDashborad')->name('home');
Route::get('/admin-list','AdminController@adminList')->name('admin-list');
Route::get('/admin-block','AdminController@adminBlock')->name('admin-block');
Route::get('/admin-unblock','AdminController@adminUnblock')->name('admin-unblock');
Route::get('/admin-edit','AdminController@adminEdit')->name('admin-edit');
Route::get('/admin-insertdatabase','AdminController@adminInsertdatabase')->name('admin-insertdatabase');

Route::post('/admin-edit-form','AdminController@adminEditForm')->name('admin-edit-form');
Route::post('/admin-insertdatabase-form','AdminController@adminInsertdatabaseForm')->name('admin-insertdatabase-form');