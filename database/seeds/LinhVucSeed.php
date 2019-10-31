<?php

use Illuminate\Database\Seeder;

class LinhVucSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = [
            [
                "ten_linh_vuc"  => "Âm nhạc"
            ],
            [
                "ten_linh_vuc"  => "Vật lý"
            ],
            [
                "ten_linh_vuc"  => "Hoá học"
            ],
            [
                "ten_linh_vuc"  => "Ngữ văn"
            ],
            [
                "ten_linh_vuc"  => "Toán học"
            ],
            [
                "ten_linh_vuc"  => "Thể dục"
            ],
            [
                "ten_linh_vuc"  => "Lịch sử"
            ],
            [
                "ten_linh_vuc"  => "Âm nhạc"
            ],
        ];

        foreach ($db as $linhvuc)
        {
            App\LinhVuc::create($linhvuc);
        }
    }
}
