<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('API')->group(function() {

	Route::middleware(['assign.guard:api','jwt.auth'])->group(function() {

		Route::prefix('linh-vuc')->group(function() {
			Route::get('/', 'LinhVucAPI@DSLinhVuc');
			Route::get('/{id}', 'LinhVucAPI@DSCauHoiTheoLinhVuc');
		});
	
		Route::prefix('goi-credit')->group(function() {
			Route::get('/', 'GoiCreditAPI@DSGoiCredit');
			Route::get('/{id}', 'GoiCreditAPI@ChiTietGoiCredit');
			Route::post('/mua-goi', 'GoiCreditAPI@muaGoiCredit');
		});
	
		Route::prefix('nguoi-choi')->group(function() {
			Route::get('/', 'NguoiChoiAPI@LayDSNguoiChoi');
			Route::post('doi-mat-khau', 'NguoiChoiAPI@doiMatKhau');	
			Route::get('/thong-tin/{id}', 'NguoiChoiAPI@thongTin');	
		});
	
		Route::get('xep-hang', "NguoiChoiAPI@xepHang");
		Route::get('lich-su-choi/{id}', "NguoiChoiAPI@lichSuNguoiChoi");
	
		Route::get('cau-hoi/{id}', 'CauHoiAPI@cauHoiTheoLinhVuc');

		Route::post('luu-luot-choi', 'LuotChoiAPI@luuLuotChoi');


	
		
	});
	
	Route::post('dang-ky', 'NguoiChoiAPI@dangKy');
	Route::post('dang-nhap', 'NguoiChoiAPI@dangNhap');
	Route::post('quen-mat-khau', 'NguoiChoiAPI@sendMail');
	Route::post('xac-nhan-ma', 'NguoiChoiAPI@confirmCode');

	
});

Route::namespace('API')->group(function() {

	Route::prefix('linh-vuc')->group(function() {
		Route::get('/', 'LinhVucAPI@DSLinhVuc');
	});

	Route::get('cau-hoi', 'CauHoiAPI@cauHoiTheoLinhVuc');

});