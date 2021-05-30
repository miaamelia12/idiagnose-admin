<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KonsultanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('konsultan')->insert([
            [
                'nama' => "dr. Cipta",
                'spesialis' => "Dokter Bedah",
                'rumah_sakit' => "RSCM",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama' => "dr. Seruni",
                'spesialis' => "Dokter Mata",
                'rumah_sakit' => "RSCM",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama' => "dr. Reza",
                'spesialis' => "Dokter Mata",
                'rumah_sakit' => "RS. Fatmawati",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
