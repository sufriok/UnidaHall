<?php

use Illuminate\Database\Seeder;

class ProdisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->truncate();

        DB::table('prodis')->insert([
            [
                'name' => 'Teknik Informatika',
            ],
            [
                'name' => 'Teknik Industri Pertanian',
            ],
            [
                'name' => 'Agro Teknologi',
            ],
            [
                'name' => 'Pendidikan Bahasa Arab',
            ],
            [
                'name' => 'Pendidikan Agama Islam',
            ],
            [
                'name' => 'Ekonomi Islam',
            ],
            [
                'name' => 'Manajemen Bisnis',
            ],
            [
                'name' => 'Perbandingan Mazhab',
            ],
            [
                'name' => 'Hukum Ekonomi Syariah',
            ],
            [
                'name' => 'Akidah dan Filsafat',
            ],
            [
                'name' => 'Ilmu Quran dan tafsir',
            ],
            [
                'name' => 'Hubungan Internasional',
            ],
            [
                'name' => 'Ilmu Komunikasi',
            ],
        ]);
    }
}
