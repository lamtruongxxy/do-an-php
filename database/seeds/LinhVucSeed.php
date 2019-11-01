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
                "ten_linh_vuc"  => "Âm nhạc",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Vật lý",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Hoá học",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Ngữ văn",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Toán học",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Thể dục",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Lịch sử",
                "img"   => "https://picsum.photos/200"
            ],
            [
                "ten_linh_vuc"  => "Âm nhạc",
                "img"   => "https://picsum.photos/200"
            ],
        ];

        foreach ($db as $linhvuc)
        {
            App\LinhVuc::create($linhvuc);
        }
    }
}
