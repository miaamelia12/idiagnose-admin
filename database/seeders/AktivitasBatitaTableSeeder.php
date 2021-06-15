<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasBatitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aktivitas_batita')->insert([
            [
                'kegiatan' => "Bangun Tidur",
                'jam_mulai' => "05:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Anak Sarapan Pagi / Bayi Minum Susu",
                'jam_mulai' => "06:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Mandi",
                'jam_mulai' => "06:45",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Berjemur didepan halaman",
                'jam_mulai' => "07:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Anak Minum Susu",
                'jam_mulai' => "08:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Anak Bermain dan Makan Snack",
                'jam_mulai' => "09:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Bermain diluar Panti dengan ANZA/Volunteer",
                'jam_mulai' => "09:00",
                'jam_selesai' => "",
                'keterangan' => "Setiap Hari Selasa",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Istirahat",
                'jam_mulai' => "10:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Anak Makan Siang / Bayi Minum Susu",
                'jam_mulai' => "11:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Istirahat, Tidur Siang",
                'jam_mulai' => "12:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Bangun Tidur",
                'jam_mulai' => "14:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Makan Buah",
                'jam_mulai' => "14:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Mandi",
                'jam_mulai' => "15:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Bermain",
                'jam_mulai' => "16:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Makan Malam / Bayi Minum Susu",
                'jam_mulai' => "17:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Anak Minum Susu (kecuali Bayi)",
                'jam_mulai' => "18:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Istirahat, Tidur Malam",
                'jam_mulai' => "19:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Bayi Minum Susu",
                'jam_mulai' => "00:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
