<?php

use Illuminate\Database\Seeder;
use App\GoiCredit;

class GoiCreditSeed extends Seeder
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
                'ten_goi'   => 'Gói 100 credit',
                'credit'    => 100,
                'so_tien'   => 1
            ],
            [
                'ten_goi'   => 'Gói 1000 credit',
                'credit'    => 1000,
                'so_tien'   => 95
            ],
            [
                'ten_goi'   => 'Gói 10000 credit',
                'credit'    => 10000,
                'so_tien'   => 900
            ],
        ];
        foreach($db as $credit) 
        {
            GoiCredit::create($credit);
        }
    }
}
