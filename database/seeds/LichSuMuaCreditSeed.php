<?php

use Illuminate\Database\Seeder;

class LichSuMuaCreditSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LichSuMuaCredit::class, 100)->create();
    }
}
