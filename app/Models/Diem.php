<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = 'diem';
    public $timestamps = false;
    // public function getGenderDiemAttribute()
    // {
    //     if ($this->gender == '') {
    //         return "-";
    //     } else {
    //         return "Nữ";
    //     }
    // }
}