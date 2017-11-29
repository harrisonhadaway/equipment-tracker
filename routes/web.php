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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new', function() {
	return view('new');
});



Route::get('/profile/{id}', 'EquipmentController@show');

Route::put('/profile/{id}', 'EquipmentController@update');

Route::post('/profile/{id}', 'EquipmentController@newrecord');



Route::get('/list', 'EquipmentController@index');

Route::resource('equipment', 'EquipmentController');