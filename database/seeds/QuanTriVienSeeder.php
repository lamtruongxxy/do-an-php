<?php

use Illuminate\Database\Seeder;
use App\QuanTriVien;

class QuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuanTriVien::create([
        	'ten_dang_nhap'=>'admin',
        	'ho_ten'=>'admin',
        	'mat_khau'=>Hash::make('123456')
        ]);
    }
}
