<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DataTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i <= 5; $i++) {
            DB::table('data_training')->insert([
                'nama_anak' => $faker->name,
                'usia' => $faker->numberBetween(0, 60),
                'berat_badan' => $faker->numberBetween(0, 60),
                'tinggi_badan' => $faker->numberBetween(0, 60),
                'status' => "Normal",
            ]);
        }
    }
}
