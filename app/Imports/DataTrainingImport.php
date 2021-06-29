<?php

namespace App\Imports;

use App\Models\DataTraining;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DataTrainingImport implements ToModel, WithHeadingRow, WithValidation
{
    public function rules(): array
    {
        return [
            'nama_anak' => 'required',
            'usia' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DataTraining([
            'nama_anak' => $row['nama_anak'],
            'usia' => $row['usia'],
            'berat_badan' => $row['berat_badan'],
            'tinggi_badan' => $row['tinggi_badan'],
            'status' => $row['status'],
        ]);
    }
}
