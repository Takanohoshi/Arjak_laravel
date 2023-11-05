<?php

namespace Database\Seeders;

use App\Models\Dataartikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikel = [
            'cover' => 'test',
            'judul' => 'ngetes',
            'tahun' => '2023',
            'kategori' => 'album',
            'deskripsi' => 'cukup tes',
            'pdf' => 'tes',
            'username' => 'tamahoshi'
        ];
        Dataartikel::insert($artikel);
    }
}
