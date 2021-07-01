<?php

namespace App\Exports;

use App\Models\Anak;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnakExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anak::with('diagnosa')->get();
    }

    public function map($anak): array
    {
        return [
            $anak->id,
            $anak->nama,
            $anak->usia,
            $anak->berat_badan,
            $anak->tinggi_badan,
            Carbon::parse($anak->tgl_lahir)->toFormattedDateString(),
            Carbon::parse($anak->tgl_masuk_ysi)->toFormattedDateString(),
            $anak->jk,
            $anak->diagnosa_id,
            $anak->kesehatan,
            $anak->pendidikan,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Usia',
            'Berat Badan',
            'Tinggi Badan',
            'Tgl Lahir',
            'Tgl Masuk YSI',
            'Jenis Kelamin',
            'Diagnosa',
            'Kesehatan',
            'Pendidikan',
        ];
    }
}
