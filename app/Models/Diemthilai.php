<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diemthilai extends Model
{
    protected $table = 'diemthilai';
    protected $fillable = ["idSV", "idMH", "idNH", "ThoiGian", "ThiLaiLyThuyet", "ThiLaiThucHanh"];
    public $timestamps = false;
}