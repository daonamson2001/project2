<?php

namespace App\Imports;

use App\Models\Diemthilai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiemthilaiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //chuỗi
        $date = str_replace("/", "-", $row["thoi_gian_cua_mon_duoc_them"]);
        // $UNIX_DATE = ($row['ngay_sinh'] - 25569) * 86400;
        // $date_column = gmdate("Y-m-d", $UNIX_DATE);
        $data = [
            "idSV" => $row['ma_sinh_vien'],
            "idMH" => $row['ma_mon_hoc'],
            "idNH" => $row['ma_nam_hoc'],
            "ThoiGian" => date("Y-m-d", strtotime($date)),
            "ThiLaiLyThuyet" => $row['diem_ly_thuyet_thi_lai'],
            "ThiLaiThucHanh" => $row['diem_thuc_hanh_thi_lai'],
        ];
        return new Diemthilai($data);
    }
}