<?php

namespace App\Exports;

use App\Models\Diem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DiemExport implements FromCollection, WithHeadings, WithMapping
{
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
            'Mã sinh viên',
            'Mã môn học',
            'Mã năm học',
            'Thời gian của môn được thêm',
            'Điểm lý thuyết',
            'Điểm thực hành',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Diem::all();
    }
}