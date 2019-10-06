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
        factory(App\LinhVuc::class, 10)->create();
    }
}
