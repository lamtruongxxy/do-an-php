<?php

use Illuminate\Database\Seeder;

class NguoiChoiSeed extends Seeder
{
    /**
     * Run the database seeds.  
     *
     * @return void
     */
    public function run()
    {
        $nguoichoi = [
            'ten_dang_nhap' => 'huy212',
            'mat_khau'      => Hash::make('123456'),
            'email'         => 'huy.821183@gmail.com',
            'hinh_dai_dien' => '',
            'diem_cao_nhat' => 90,
            'credit'        => 1000
        ];
        App\NguoiChoi::create($nguoichoi);
    }
}
