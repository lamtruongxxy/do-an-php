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
		Route::get('/lay-danh-sach', 'LinhVucController@layDanhSachLinhVuc')->name('getListAjax');
		Route::post('/them-linh-vuc', 'LinhVucController@store')->name('add');
		Route::put("/sua-linh-vuc", "LinhVucController@update")->name('edit');
		Route::delete('/xoa-linh-vuc/{id}', 'LinhVucController@destroy')->name('remove');
		Route::get('/ds-linh-vuc-da-xoa', 'LinhVucController@trashList')->name('trash');
		Route::post('/khoi-phuc', 'LinhVucController@restore')->name('restore');
	});
});

Route::prefix('cau-hoi')->group(function() {
	Route::name('cau-hoi.')->group(function() {
		Route::get('/', 'CauHoiController@index')->name('index');
		Route::get('/ds-cau-hoi-da-xoa', 'CauHoiController@trashList')->name('trash');
		Route::get('/them-cau-hoi', 'CauHoiController@create')->name('create');
	});
});

Route::prefix('goi-credit')->group(function() {
	Route::name('goi-credit.')->group(function() {
		Route::get('/', 'GoiCreditController@index')->name('index');
		Route::get('/ds-goi-credit-da-xoa', 'GoiCreditController@trashList')->name('trash');
		Route::get('/them-goi-credit', 'GoiCreditController@create')->name('create');
	});
});