<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = 'diem';
    protected $fillable = ["idSV", "idMH", "idNH", "ThoiGian", "LyThuyet", "ThucHanh"];
    public $timestamps = false;
}