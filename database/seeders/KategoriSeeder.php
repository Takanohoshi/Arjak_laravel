<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{

    public function run()
    {
        $kategoriData = [
            [
                'nm_kategori' => 'Music',
                'deskripsi' => 'Kategori untuk music',
            ],
            [
                'nm_kategori' => 'Vis Art',
                'deskripsi' => 'Kategori untu vis art',
            ],
            // Tambahkan data Kategori lainnya sesuai kebutuhan Anda
        ];

        foreach ($kategoriData as $kategori) {
            Kategori::create($kategori);
        }
    }
}