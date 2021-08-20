<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Diem', function (Blueprint $table) {
            $table->string('idSV');
            $table->string('idMH');
            $table->unsignedBigInteger('idNH');
            $table->foreign('idNH')->references('id')->on('NamHoc');
            $table->foreign('idSV')->references('idSV')->on('SinhVien');
            $table->foreign('idMH')->references('idMH')->on('MonHoc');
            $table->double('LyThuyet');
            $table->double('ThucHanh');
            $table->double('ThiLaiLyThuyet');
            $table->double('ThiLaiThucHanh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Diem');
    }
}