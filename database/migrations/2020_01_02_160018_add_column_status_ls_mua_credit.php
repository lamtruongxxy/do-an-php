<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusLsMuaCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lich_su_mua_credit', function (Blueprint $table) {
            $table->boolean('trang_thai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lich_su_mua_credit', function (Blueprint $table) {
            $table->dropColumn('trang_thai');
        });
    }
}
