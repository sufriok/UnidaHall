<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('staff')->truncate();

        DB::table('staff')->insert([
            [
                'name' => 'Administrator',
            ],
            [
                'name' => 'Biro Sarana dan Prasarana',
            ],
            [
                'name' => 'Hotel UNIDA',
            ],
            [
                'name' => 'Gedung Pusat Sirah Nabawiah (GPSN)',
            ],
        ]);
    }
}
