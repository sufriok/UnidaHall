<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('rooms')->truncate();
        
        DB::table('rooms')->insert([
            [
                'room' => "Aula GU Baru lt.3",
                'banner' => "3.61m x 2.5m",
                'max' => "70 ",
                'image' => "hallgult3.jpg",
                'staff_id' => "2",
                'vasilitas' => "Full AC, Sound Sistem, Proyektor, LCD, Mimbar",
                'pembimbing' => "Moh. Syifaurrosydin, S.F.I.,M.Pd.",
                'surat' => "Surat_peminjaman_sapras.docx",
            ],
            [
                'room' => "Aula GU Baru lt.4",
                'banner' => "6.25m x 2.44m",
                'max' => "450",
                'image' => "hallgult4.jpg",
                'staff_id' => "2",
                'vasilitas' => "Full AC, Sound Sistem, Proyektor, LCD, Mimbar",
                'pembimbing' => "Moh. Syifaurrosydin, S.F.I.,M.Pd.",
                'surat' => "Surat_Peminjaman_sapras_lt4.docx",
            ],
            [
                'room' => "Aula CIOS",
                'banner' => "4m x 3m",
                'max' => "90",
                'image' => "hall_cios.jpg",
                'staff_id' => "2",
                'vasilitas' => "Full AC, Sound Sistem, Proyektor, LCD",
                'pembimbing' => "Moh. Syifaurrosydin, S.F.I.,M.Pd.",
                'surat' => "Surat_peminjaman_sapras.docx",
            ],
            [
                'room' => "Aula Hotel",
                'banner' => "3.6m x 1.65m",
                'max' => "60",
                'image' => "hallhotel.jpg",
                'staff_id' => "3",
                'vasilitas' => "Full AC, Sound Sistem, Proyektor, LCD",
                'pembimbing' => "Imam Hariyadi, M.S.I.",
                'surat' => "Surat_peminjaman_hotel.docx",
            ],
            [
                'room' => "Aula GPSN",
                'banner' => "3.03m x 1.9m",
                'max' => "80",
                'image' => "hallsirah.jpg",
                'staff_id' => "4",
                'vasilitas' => "Full AC, Sound Sistem, Proyektor, LCD, Mimbar",
                'pembimbing' => "Mhd. Jabal Alamsyah, Lc.,M.A.",
                'surat' => "Surat_peminjaman_gpsn.docx",
            ],
        ]);
    }
}
