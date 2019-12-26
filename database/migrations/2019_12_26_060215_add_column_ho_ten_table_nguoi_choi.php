<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnHoTenTableNguoiChoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguoi_choi', function (Blueprint $table) {
            $table->string('ho_ten');
            $table->integer('diem_cao_nhat')->default(0)->change();
            $table->integer('credit')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nguoi_choi', function (Blueprint $table) {
            //
        });
    }
}
