<?php

namespace App\Exports;

use App\Models\Diem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Database\Eloquent\Collection;

class DiemMonExport implements FromCollection, WithHeadings
{
    public function __construct($idL, $idMH)
    {
        $this->idL = $idL;
        $this->idMH = $idMH;
    }
    public function map($diem): array
    {
        $date = date_create($diem->ThoiGian);
        $data = [
            $diem->idSV,
            $diem->idMH,
            $diem->idNH,
            date_format($date, "d/m/Y"),
            $diem->LyThuyet,
            $diem->ThucHanh,
        ];
        return $data;
    }
    public function headings(): array
    {
        return [
            'Tên lớp',
            'Tên môn học',
            'Mã Sinh viên',
            'Tên sinh viên',
            'Điểm lý thuyết',
            'Điểm thực hành',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('sinhvien.idL', 'monhoc.tenMH', 'sinhvien.idSV', 'tenSV', 'LyThuyet', 'ThucHanh')
            ->where('sinhvien.idL', $this->idL)
            ->where('monhoc.idMH', $this->idMH)
            ->get();
    }
}