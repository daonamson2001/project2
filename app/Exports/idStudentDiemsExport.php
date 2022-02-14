<?php

namespace App\Exports;

use App\Models\Diem;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class idStudentDiemsExport implements FromCollection, WithHeadings
{
    public function __construct($idSV, $idNH)
    {
        $this->idSV = $idSV;
        $this->idNH = $idNH;
    }
    public function map($diem): array
    {
        $date = date_create($diem->ThoiGian);
        $data = [
            $diem->idSV,
            $diem->idMH,
            $diem->idNH,
            $diem->LyThuyet,
            $diem->ThucHanh,
        ];
        return $data;
    }
    public function headings(): array
    {
        return [
            'Mã sinh viên',
            'Tên sinh viên',
            'Tên môn học',
            'Điểm lý thuyết',
            'Điểm thực hành',
            'Điểm trung bình môn',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select(DB::raw('sinhvien.idSV,sinhvien.tenSV,monhoc.tenMH,LyThuyet, ThucHanh,
        CASE
        WHEN LyThuyet IS NULL THEN ThucHanh
        WHEN ThucHanh IS NULL THEN LyThuyet
        ELSE (LyThuyet + ThucHanh)/2
        END AS dtb'))
            ->where('sinhvien.idSV', $this->idSV)
            ->where('monhoc.idNH', $this->idNH)
            ->get();
    }
}