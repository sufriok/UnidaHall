<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();

        DB::table('statuses')->insert([
            [
                'name' => 'Terkonfirmasi',
            ],
            [
                'name' => 'Belum Terkonfirmasi',
            ],
        ]);
    }
}
