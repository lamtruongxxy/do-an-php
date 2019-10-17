<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnIdNguoiChoiAndAddColumnsSoCauDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('luot_choi', function (Blueprint $table) {
            $table->renameColumn('id_nguoi_choi', 'nguoi_choi_id');
            $table->integer('so_cau');
            $table->integer('diem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('luot_choi', function (Blueprint $table) {
            $table->renameColumn('nguoi_choi_id', 'id_nguoi_choi');
            $table->dropColumn('so_cau');
            $table->dropColumn('diem');
        });
    }
}
