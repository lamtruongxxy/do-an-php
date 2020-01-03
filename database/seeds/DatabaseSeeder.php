<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuanTriVienSeeder::class);
        $this->call(LinhVucSeed::class);
        $this->call(CauHoiSeed::class);
        $this->call(GoiCreditSeed::class);
        $this->call(NguoiChoiSeed::class);
        $this->call(LichSuMuaCreditSeed::class);
        $this->call(LuotChoiSeed::class);
    }
}
