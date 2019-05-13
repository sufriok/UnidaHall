<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            [
                'name' => "Admin",
                'email' => "admin@test.com",
                'no_hp' => "0873265362663",
                'staff_id' => "1",
                'password' => bcrypt('staffadmin'),

            ],
            [
                'name' => "Sarana Prasarana",
                'email' => "sapras@test.com",
                'no_hp' => "087394736362",
                'staff_id' => "2",
                'password' => bcrypt('123456'),

            ],
            [
                'name' => "Hotel",
                'email' => "hotel@test.com",
                'no_hp' => "0873265362663",
                'staff_id' => "3",
                'password' => bcrypt('123456'),

            ],
            [
                'name' => "GPSN",
                'email' => "gpsn@test.com",
                'no_hp' => "0873265362663",
                'staff_id' => "4",
                'password' => bcrypt('123456'),

            ],
        ]);
    }
}
