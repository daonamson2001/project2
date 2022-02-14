<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ["idSV", "tenSV", "email", "gioiTinh", "ngaySinh", "idL", "queQuan", "passWord", "HoatDong"];
    public $timestamps = false;
    //Bắt đầu bắt get, kết thúc bằng attribute
    public function getGenderNameAttribute()
    {
        if ($this->gender == 1) {
            return "Nam";
        } else {
            return "Nữ";
        }
    }
}