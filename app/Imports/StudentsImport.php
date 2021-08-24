<?php

namespace App\Imports;

use App\Models\Lop;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //chuỗi
        $date = str_replace("/", "-", $row["ngay_sinh"]);
        // $UNIX_DATE = ($row['ngay_sinh'] - 25569) * 86400;
        // $date_column = gmdate("Y-m-d", $UNIX_DATE);
        $data = [
            "idSV" => $row['ma_sinh_vien'],
            "tenSV" => $row['ho_ten'],
            "email" => $row['email'],
            "gioiTinh" => $row['gioi_tinh'] == "Nam" ? 1 : 0,
            "ngaySinh" => date("Y-m-d", strtotime($date)),
            "idL" => Lop::where('tenLop', $row['id_lop'])->value('idL'),
            "queQuan" => $row['que_quan'],
            "passWord" => $row['password'],
        ];
        return new Student($data);
    }
}