<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiangVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiangVien', function (Blueprint $table) {
            $table->string('idGV', 20)->primary();
            $table->string('tenGV');
            $table->boolean('gioiTinh');
            $table->date('ngaySinh');
            $table->string('email')->unique();
            $table->string('idCN');
            $table->foreign('idCN')->references('idCN')->on('ChuyenNganh');
            $table->string('passWord');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GiangVien');
    }
}