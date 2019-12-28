<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreateQuenMatKhauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quen_mat_khau', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('ma_xac_nhan');
            $table->dateTime('han_su_dung')->default(Carbon::now()->addMinute(1));
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quen_mat_khau');
    }
}
