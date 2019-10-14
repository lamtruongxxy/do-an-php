<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsTableCtLuotChoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chi_tiet_luot_choi', function (Blueprint $table) {
            $table->renameColumn('id_luot_choi', 'luot_choi_id');
            $table->renameColumn('id_cau_hoi', 'cau_hoi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chi_tiet_luot_choi', function (Blueprint $table) {
            $table->renameColumn('luot_choi_id', 'id_luot_choi');
            $table->renameColumn('cau_hoi_id', 'id_cau_hoi');
        });
    }
}
