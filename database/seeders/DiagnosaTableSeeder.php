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
                'nama_diagnosa' => "Tuna Rungu Wicara",
                'nama_lain' => "Gangguan Pendengaran dan Wicara",
                'deskripsi' => "Kondisi fisik yang dialami oleh seseorang yang tidak memilki kemampuan untuk mendengarkan suara dalam bentuk apapun, biasanya
                                seorang tuna rungu juga menderita tuna wicara atau ketidak mampuan untuk berbicara.",
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
            [
                'nama_diagnosa' => "Autisme atau Autism Spectrum Disorder (ASD)",
                'nama_lain' => "Gangguan Perilaku",
                'deskripsi' => "Gangguan perkembangan pada anak yang menyebabkan kemampuan komunikasi dan sosialisasi anak terganggu.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "ADHD (Attention Deficit Hyperactivity Disorder)",
                'nama_lain' => "Gangguan Perilaku",
                'deskripsi' => "Gangguan mental yang menyebabkan seorang anak sulit memusatkan perhatian, serta memiliki perilaku impulsif dan hiperaktif, sehingga dapat berdampak pada prestasi anak di sekolah.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "BPD (Borderline Personality Disorder)",
                'nama_lain' => "Gangguan Kepribadian Ambang",
                'deskripsi' => "Gangguan mental serius yang memengaruhi perasaan dan cara berpikir penderitanya. Kondisi ini ditandai dengan suasana hati dan citra diri yang senantiasa berubah-ubah dan sulit dikontrol, serta perilaku yang impulsif.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Suara Sengau",
                'nama_lain' => "Rhinolalia",
                'deskripsi' => "Perubahan suara saat aliran udara di area hidung terhambat sehingga menyebabkan suara atau kata-kata yang dihasilkan menjadi tidak jelas seperti ketika seseorang menutup hidungnya saat berbicara.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "ADD (Attention Deficit Disorder)",
                'nama_lain' => "",
                'deskripsi' => "Suatu bentuk kelainan yang membuat seseorang sulit mengontrol tindakannya dan/atau mengalami kesulitan untuk fokus pada sesuatu atau sulit memperhatikan suatu kondisi atau wacana.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Cerebral Palsy",
                'nama_lain' => "Lumpuh Otak",
                'deskripsi' => "Penyakit ini disebabkan oleh gangguan perkembangan otak, yang biasanya terjadi saat anak masih di dalam kandungan. Gangguan perkembangan otak ini juga dapat terjadi ketika proses persalinan atau dua tahun pertama setelah kelahiran.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Post Katarak",
                'nama_lain' => "",
                'deskripsi' => "Setelah operasi katarak, mata umumnya akan terasa berpasir, kurang nyaman, atau tampak kemerahan selama beberapa hari. Hal ini normal terjadi selama masa penyembuhan. Biasanya, gejala-gejala tersebut akan hilang dan penglihatan pasien akan kembali jernih dalam waktu 6-8 minggu.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Mikrosefalus",
                'nama_lain' => "Microcephaly",
                'deskripsi' => "Kondisi langka di mana kepala bayi berukuran lebih kecil dari ukuran kepala bayi normal. Mikrosefalus juga ditandai dengan ukuran otak yang menyusut serta tidak berkembang dengan sempurna.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Atrofi",
                'nama_lain' => "",
                'deskripsi' => "Pembuangan sebagian atau seluruh bagian tubuh. Penyebab atrofi antara lain mutasi (yang dapat merusak gen untuk membangun organ), nutrisi yang buruk, sirkulasi yang buruk, hilangnya dukungan hormon, hilangnya pasokan saraf ke organ target, jumlah apoptosis sel yang berlebihan, dan kurangnya gerakan atau penyakit intrinsik pada jaringan itu sendiri.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Cerebral Palsy Total Body",
                'nama_lain' => "",
                'deskripsi' => "Penyakit ini disebabkan oleh gangguan perkembangan otak, yang biasanya terjadi saat anak masih di dalam kandungan. Gangguan perkembangan otak ini juga dapat terjadi ketika proses persalinan atau dua tahun pertama setelah kelahiran.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Bibir Sumbing",
                'nama_lain' => "",
                'deskripsi' => "Kelainan bawaan yang ditandai dengan adanya celah pada bibir. Celah tersebut bisa muncul di tengah, kanan, atau bagian kiri bibir. Bibir sumbing sering kali disertai dengan munculnya celah di langit-langit mulut yang sering disebut dengan langit sumbing.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Down Syndrome",
                'nama_lain' => "",
                'deskripsi' => "Kelainan genetik yang menyebabkan penderitanya memiliki tingkat kecerdasan yang rendah, dan kelainan fisik yang khas.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'nama_diagnosa' => "Sumbing Rongga Mulut",
                'nama_lain' => "",
                'deskripsi' => "Kelainan bawaan yang ditandai dengan adanya celah pada bibir. Celah tersebut bisa muncul di tengah, kanan, atau bagian kiri bibir. Bibir sumbing sering kali disertai dengan munculnya celah di langit-langit mulut yang sering disebut dengan langit sumbing.",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
