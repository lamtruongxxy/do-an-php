<?php

use Illuminate\Database\Seeder;

class CauHoiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CauHoi::class, 1000)->create();
    }
}
