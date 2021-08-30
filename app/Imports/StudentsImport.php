<?php

namespace App\Imports;

use App\Models\Lop;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class StudentsImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure

{
    use Importable, SkipsErrors, SkipsFailures;
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
            "idL" => Lop::where('tenLop', $row['ma_lop'])->value('idL'),
            "queQuan" => $row['que_quan'],
            "passWord" => $row['mat_khau'],
        ];
        return new Student($data);
    }
    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:sinhvien,email']
        ];
    }
}