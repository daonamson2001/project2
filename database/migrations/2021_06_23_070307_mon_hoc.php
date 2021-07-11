<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MonHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MonHoc', function (Blueprint $table) {
            $table->string('idMH', 20)->primary();
            $table->string('tenMH');
            $table->string('idHK');
            $table->foreign('idHK')->references('idHK')->on('HocKy');
            $table->string('idCN');
            $table->foreign('idCN')->references('idCN')->on('ChuyenNganh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MonHoc');
    }
}