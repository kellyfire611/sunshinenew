<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddColumnV1ToNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cusc_nhanvien', function (Blueprint $table) {
            $table->string('nv_ghinhodangnhap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cusc_nhanvien', function (Blueprint $table) {
            $table->string('nv_ghinhodangnhap');
        });
    }
}
