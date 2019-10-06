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
	return view('linh-vuc.index');
});

Route::prefix("linh-vuc")->group(function() {
	Route::name("linh-vuc.")->group(function() {
		Route::get("/", "LinhVucController@index")->name('index');
		Route::post('/them-linh-vuc', 'LinhVucController@store')->name('add');
		Route::put("/sua-linh-vuc", "LinhVucController@update")->name('edit');
		Route::get('/xoa-linh-vuc/{id}', 'LinhVucController@destroy')->name('remove');
	});
});