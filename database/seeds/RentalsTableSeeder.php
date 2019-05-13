<?php

use Illuminate\Database\Seeder;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->truncate();
        
        DB::table('rentals')->insert([
            [
                'staff_id' => "2",
                'room_id' => "1",
                'peminjam' => "cago",
                'prodi_id' => "1",
                'no_hp' => "081234567801",
                'alamat' => "ali 412",
                'acara' => "pelantikan himpunan",
                'tgl_awal' => "2019-05-13",
                'tgl_akhir' => "2019-05-13",
                'surat' => "Surat_Peminjaman_sapras.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "Sarana Prasarana",
            ],
            [
                'staff_id' => "2",
                'room_id' => "2",
                'peminjam' => "galuh",
                'prodi_id' => "2",
                'no_hp' => "081234567802",
                'alamat' => "abu bakar 312",
                'acara' => "seminar keuangan",
                'tgl_awal' => "2019-05-13",
                'tgl_akhir' => "2019-05-13",
                'surat' => "Surat_Peminjaman_sapras_lt4.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "Sarana Prasarana",
            ],
            [
                'staff_id' => "2",
                'room_id' => "3",
                'peminjam' => "bambang",
                'prodi_id' => "4",
                'no_hp' => "081234567803",
                'alamat' => "umar 217",
                'acara' => "seminar kebersihan",
                'tgl_awal' => "2019-05-13",
                'tgl_akhir' => "2019-05-13",
                'surat' => "Surat_Peminjaman_sapras.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "Sarana Prasarana",
            ],
            [
                'staff_id' => "3",
                'room_id' => "4",
                'peminjam' => "edwan",
                'prodi_id' => "6",
                'no_hp' => "081234567804",
                'alamat' => "ali 320",
                'acara' => "wokshop hidroponik",
                'tgl_awal' => "2019-05-13",
                'tgl_akhir' => "2019-05-13",
                'surat' => "Surat_Peminjaman_hotel.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "Hotel",
            ],
            [
                'staff_id' => "4",
                'room_id' => "5",
                'peminjam' => "tomi",
                'prodi_id' => "5",
                'no_hp' => "081234567805",
                'alamat' => "utsman 220",
                'acara' => "pelepasan pkl",
                'tgl_awal' => "2019-05-13",
                'tgl_akhir' => "2019-05-13",
                'surat' => "Surat_Peminjaman_gpsn.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "GPSN",
            ],
            [
                'staff_id' => "3",
                'room_id' => "4",
                'peminjam' => "andika",
                'prodi_id' => "5",
                'no_hp' => "081234567806",
                'alamat' => "umar 412",
                'acara' => "seminar pancasila",
                'tgl_awal' => "2019-05-17",
                'tgl_akhir' => "2019-05-17",
                'surat' => "Surat_Peminjaman_hotel.jpg",
                'color' => "#e2b12d",
                'status' => "belum terkonfirmasi",
                'pember_izin' => "Hotel",
            ],
            [
                'staff_id' => "4",
                'room_id' => "5",
                'peminjam' => "radi",
                'prodi_id' => "3",
                'no_hp' => "081234567807",
                'alamat' => "utsman 213",
                'acara' => "kajian rutin",
                'tgl_awal' => "2019-05-15",
                'tgl_akhir' => "2019-05-15",
                'surat' => "Surat_Peminjaman_gpsn.jpg",
                'color' => "#4eb478",
                'status' => "terkonfirmasi",
                'pember_izin' => "GPSN",
            ],
            [
                'staff_id' => "2",
                'room_id' => "3",
                'peminjam' => "rangga",
                'prodi_id' => "4",
                'no_hp' => "081234567808",
                'alamat' => "ali 207",
                'acara' => "whokshop web",
                'tgl_awal' => "2019-05-20",
                'tgl_akhir' => "2019-05-20",
                'surat' => "Surat_Peminjaman_sapras.jpg",
                'color' => "#e2b12d",
                'status' => "belum terkonfirmasi",
                'pember_izin' => "Sarana Prasarana",
            ],
        ]);
    }
}
