<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DiagnosaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diagnosa')->insert([
            [
                'nama_diagnosa' => "Tuna Grahita",
                'nama_lain' => "Keterbelakangan mental",
                'deskripsi' => "Kecerdasan di bawah rata-rata dan seperangkat keterampilan kehidupan yang ada sebelum usia 18.
                                Fungsi intelektual dapat diukur dengan tes.
                                Gejala utama berupa kesulitan berpikir dan memahami. Keterampilan hidup yang bisa terpengaruh yaitu keterampilan konseptual, sosial, dan praktis tertentu.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Tuna Wicara",
                'nama_lain' => "",
                'deskripsi' => "Tuna wicara yang dialami oleh anak-anak bukan berarti membuatnya kesulitan untuk dapat berkembang seperti seusianya. Kualitas hidup tuna wicara bisa meningkat dengan mengikuti terapi tuna wicara.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Tuna Netra",
                'nama_lain' => "Gangguan Penglihatan",
                'deskripsi' => "Berdasarkan tingkat gangguannya Tunanetra dibagi dua yaitu buta total (total blind) dan masih mempunyai sisa penglihatan (low visioan). Alat bantu untuk mobilitas tunanetra menggunakan tongkat khusus, yaitu tongkat berwarna putih dengan garis merah horisontal. Akibat hilang/berkurangnya fungsi indra penglihatannya maka tunanetra berusaha memaksimalkan fungsi indra-indra yang lainnya seperti, perabaan, penciuman, pendengaran, dan lain sebagainya sehingga tidak sedikit penyandang tunanetra yang memiliki kemampuan luar biasa misalnya di bidang musik atau ilmu pengetahuan.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
