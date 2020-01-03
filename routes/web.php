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

// Route::get('/', 'LinhVucController@index')->middleware("auth");

use App\Utilities\FormatPriceVND;

Route::middleware("auth")->group(function(){ 

	Route::get('/', 'DashBoardController@index')->name('index');

	Route::prefix("linh-vuc")->group(function() {
		Route::name("linh-vuc.")->group(function() {
			Route::get("/", "LinhVucController@index")->name('index');
			Route::post('/them-linh-vuc', 'LinhVucController@store')->name('store');
			Route::get('/sua-linh-vuc/{id}', 'LinhVucController@edit')->name('edit');
			Route::put("/sua-linh-vuc", "LinhVucController@update")->name('update');
			Route::delete('/xoa-linh-vuc/{id}', 'LinhVucController@destroy')->name('remove');
			Route::get('/ds-linh-vuc-da-xoa', 'LinhVucController@trashList')->name('trash');
			Route::post('/khoi-phuc/', 'LinhVucController@restore')->name('restore');
			Route::delete('/xoa-vinh-vien/{id}', 'LinhVucController@delete')->name('delete');
		});
	});

	Route::prefix('cau-hoi')->group(function() {
		Route::name('cau-hoi.')->group(function() {
			Route::get('/', 'CauHoiController@index')->name('index');
			Route::get('/ds-cau-hoi-da-xoa', 'CauHoiController@trashList')->name('trash');
			Route::get('/them-cau-hoi', 'CauHoiController@create')->name('create');
			Route::get('/sua-cau-hoi/{id}', 'CauHoiController@edit')->name('edit');
			Route::post('/them-cau-hoi', 'CauHoiController@store')->name('store');
			Route::put('/sua-cau-hoi/{id}', 'CauHoiController@update')->name('update');
			Route::delete('/xoa-cau-hoi/{id}', 'CauHoiController@destroy')->name('remove');
			Route::post('/khoi-phuc/{id}', 'CauHoiController@restore')->name('restore');
			Route::delete('/xoa-vinh-vien/{id}', 'CauHoiController@delete')->name('delete');
		});
	});

	Route::prefix('goi-credit')->group(function() {
		Route::name('goi-credit.')->group(function() {
			Route::get('/', 'GoiCreditController@index')->name('index');
			Route::get('/ds-goi-credit-da-xoa', 'GoiCreditController@trashList')->name('trash');
			Route::post('/them-goi-credit', 'GoiCreditController@store')->name('store');
			Route::put("/sua-goi-credit", "GoiCreditController@update")->name('update');
			Route::delete('/xoa-goi-credit/{id}', 'GoiCreditController@destroy')->name('remove');
			Route::get('/ds-goi-credit-da-xoa', 'GoiCreditController@trashList')->name('trash');
			Route::post('/khoi-phuc/', 'GoiCreditController@restore')->name('restore');
			Route::delete('/xoa-vinh-vien/{id}', 'GoiCreditController@delete')->name('delete');
		});
	});

	Route::prefix('nguoi-choi')->group(function() {
		Route::name('nguoi-choi.')->group(function() {
			Route::get('/', 'NguoiChoiController@index')->name('index');
			Route::get('/ds-nguoi-choi-da-xoa', 'NguoiChoiController@trashList')->name('trash');
			Route::delete('/xoa-nguoi-choi/{id}', 'NguoiChoiController@destroy')->name('remove');
			Route::post('/khoi-phuc/', 'NguoiChoiController@restore')->name('restore');
			Route::delete('/xoa-vinh-vien/{id}', 'NguoiChoiController@delete')->name('delete');
			Route::get('profile/{name}', 'NguoiChoiController@profile')->name('profile');
		});
	});

	Route::prefix('lich-su-mua-credit')->group(function() {
		Route::name('lich-su-mua-credit.')->group(function() {
			Route::get('/', 'LichSuMuaCreditController@index')->name('index');
		});
	});

	Route::prefix('luot-choi')->group(function() {
		Route::name('luot-choi.')->group(function() {
			Route::get('/', 'LuotChoiController@index')->name('index');
		});
	});
});



Route::get('dang-nhap','QuanTriVienController@getLogin')->name('get-login')->middleware('guest');
Route::post('dang-nhap','QuanTriVienController@postLogin')->name('post-login');
Route::get('dang-xuat','QuanTriVienController@logout')->name('logout');

