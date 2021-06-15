<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasAnakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aktivitas_anak')->insert([
            [
                'kegiatan' => "Bangun Tidur",
                'jam_mulai' => "04:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Mandi",
                'jam_mulai' => "05:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Sarapan Pagi",
                'jam_mulai' => "06:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Sekolah Dasar Nurul Falah",
                'jam_mulai' => "06:15",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Sekolah Ulaka",
                'jam_mulai' => "07:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Makan Siang",
                'jam_mulai' => "12:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Istirahat, Tidur Siang",
                'jam_mulai' => "13:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Terapi Wicara",
                'jam_mulai' => "15:00",
                'jam_selesai' => "",
                'keterangan' => "Senin - Selasa",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Mandi",
                'jam_mulai' => "16:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Makan Buah",
                'jam_mulai' => "16:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Belajar",
                'jam_mulai' => "17:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Makan Malam",
                'jam_mulai' => "19:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Minum Susu",
                'jam_mulai' => "20:00",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Istirahat, Tidur Malam",
                'jam_mulai' => "20:30",
                'jam_selesai' => "",
                'keterangan' => "",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Mira Latihan / SOINA di Ragunan",
                'jam_mulai' => "07:30",
                'jam_selesai' => "10:00",
                'keterangan' => "Setiap Hari Sabtu",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Jadwal Ody Terapi",
                'jam_mulai' => "15:30",
                'jam_selesai' => "16:30",
                'keterangan' => "Senin - Rabu",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'kegiatan' => "Irma Latihan Menyanyi di Pranajaya",
                'jam_mulai' => "15:00",
                'jam_selesai' => "17:00",
                'keterangan' => "Setiap Hari Senin",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
