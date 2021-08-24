<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithHeadings, WithMapping
{
    public function map($student): array
    {
        $date = date_create($student->ngaySinh);
        $data = [
            $student->idSV,
            $student->tenSV,
            $student->email,
            $student->gioiTinh == 1 ? "Nam" : "Nữ",
            date_format($date, "d/m/Y"),
            $student->idL,
            $student->queQuan,
            $student->passWord
        ];
        return $data;
    }
    public function headings(): array
    {
        return [
            'Mã sinh viên',
            'Họ tên',
            'Email',
            'Giới tính',
            'ngày sinh',
            'id lớp',
            'Quê quán',
            'password'
        ];
    }
    /**
     * 
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all();
    }
}