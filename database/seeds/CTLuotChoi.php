<?php

use Illuminate\Database\Seeder;

class CTLuotChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ChiTietLuotChoi::class, 100)->create();
    }
}
