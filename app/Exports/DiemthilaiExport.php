<?php

namespace App\Exports;

use App\Models\Diemthilai;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DiemthilaiExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct($flag = false)
    {
        $this->flag = $flag;
    }
    public function map($diemthilai): array
    {
        $date = date_create($diemthilai->ThoiGian);
        $data = [
            $diemthilai->idSV,
            $diemthilai->idMH,
            $diemthilai->idNH,
            date_format($date, "d/m/Y"),
            $diemthilai->ThiLaiLyThuyet,
            $diemthilai->ThiLaiThucHanh,
        ];
        return $data;
    }
    public function headings(): array
    {
        if ($this->flag) return [
            'Mã sinh viên',
            'Mã môn học',
            'Mã năm học',
            'Thời gian của môn được thêm',
            'Điểm thi lại lý thuyết',
            'Điểm thi lại thực hành',
        ];
        return [
            'Mã sinh viên',
            'Mã môn học',
            'Mã năm học',
            'Thời gian của môn được thêm',
            'Điểm lý thuyết thi lại',
            'Điểm thực hành thi lại',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->flag) return new Collection([]);
        return Diemthilai::all();
    }
}