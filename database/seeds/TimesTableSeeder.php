<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->truncate();
        
        DB::table('times')->insert([
            [
                'waktu' => "Pagi",
            ],
            [
                'waktu' => "Malam",
            ],
            [
                'waktu' => "Full Day",
            ],
            [
                'waktu' => "2 hari",
            ],
            [
                'waktu' => "3 hari",
            ],
        ]);
    }
}
