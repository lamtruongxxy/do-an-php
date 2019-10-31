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
        factory(App\NguoiChoi::class, 100)->create();
    }
}
