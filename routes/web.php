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

Route::get('/new', function() {
	return view('new');
});

Route::get('/home', 'EquipmentController@favorites');

Route::get('/profile/{id}', 'EquipmentController@show');

Route::get('/profile/{id}/{recordId}', 'EquipmentController@showrecord');

Route::put('/profile/{id}', 'EquipmentController@update');

Route::post('/profile/{id}', 'EquipmentController@newrecord');

Route::post('/profile/{id}/favorite', 'EquipmentController@favorite_equipment');

Route::get('/list', 'EquipmentController@index');

Route::resource('equipment', 'EquipmentController');