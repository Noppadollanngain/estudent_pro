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

Route::get('/link/download-app', function() {
    return view('download');
});
Route::get('/home', 'AdminController@indexDashborad')->name('home');
Route::get('/admin-list','AdminController@adminList')->name('admin-list');
Route::get('/admin-block','AdminController@adminBlock')->name('admin-block');
Route::get('/admin-unblock','AdminController@adminUnblock')->name('admin-unblock');
Route::get('/admin-edit','AdminController@adminEdit')->name('admin-edit');
Route::get('/admin-insertdatabase','AdminController@adminInsertdatabase')->name('admin-insertdatabase');
Route::get('/admin-searchstudent','AdminController@adminSearchstudent')->name('admin-searchstudent');
Route::get('/student-searchBy','StudentController@searchBy')->name('student-searchBy');
Route::get('/student-edit','StudentController@studentEdit')->name('student-edit');
Route::get('/admin-searchdocument','AdminController@adminSearchdocument')->name('admin-searchdocument');
Route::get('document-searchBy','DocumentController@searchBy')->name('document-searchBy');
Route::get('/document-edit','DocumentController@documentEdit')->name('document-edit');
Route::get('/document-edit-confrim','DocumentController@documentEditconfrim')->name('document-edit-confrim');
Route::get('/document-create','DocumentController@documentCreate')->name('document-create');
Route::get('/new-create','NewsController@createNew')->name('new-create');
Route::get('/new-list','NewsController@listNews')->name('new-list');
Route::get('/new-edit','NewsController@newEdit')->name('new-edit');
Route::get('/new-send','NewsController@sendNew')->name('new-send');
Route::get('/any-function','AnyFunctionController@index')->name('any');
Route::get('/alert-doc','AnyFunctionController@alert_doc')->name('any-alertdoc');
Route::get('/reset-doc','AnyFunctionController@resetDoc')->name('any-reset');
Route::get('/update-doc','AnyFunctionController@updateType')->name('any-update');
Route::get('/delete-news','NewsController@deleteNews')->name('delete-new');

Route::post('/admin-edit-form','AdminController@adminEditForm')->name('admin-edit-form');
Route::post('/admin-insertdatabase-form','AdminController@adminInsertdatabaseForm')->name('admin-insertdatabase-form');
Route::post('/admin-insertdocument-form','AdminController@adminInsertDocumentForm')->name('admin-insertdocument-form');
Route::post('/student-edit-form','StudentController@studentEditForm')->name('student-edit-form');
Route::post('/document-edit-form','DocumentController@documentEditForm')->name('document-edit-form');
Route::post('/document-create-form','DocumentController@documentCreateForm')->name('document-create-form');
Route::post('/news-create-form','NewsController@createNewform')->name('new-create-form');
Route::post('/new-edit-form','NewsController@newEditform')->name('new-edit-form');