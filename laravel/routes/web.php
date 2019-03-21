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
});

// Route::get('/search', 'NotesController@search');

// Route::resource('notes', 'NotesController');

Route::get('/employee', 'EmployeeController@index');
Route::get('/create', 'EmployeeController@create');
Route::post('/add', 'EmployeeController@store')->name('add');
Route::get('/employeepage', 'EmployeeController@display');
Route::get('/edit/{id}', 'EmployeeController@edit');
Route::put('/updateimage/{id}', 'EmployeeController@update');


