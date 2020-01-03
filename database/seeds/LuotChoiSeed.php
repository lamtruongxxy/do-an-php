<?php

use Illuminate\Database\Seeder;

class LuotChoiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LuotChoi::class, 100)->create();
    }
}
