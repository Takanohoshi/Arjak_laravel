<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Sesuaikan dengan nama tabel di database

    use HasFactory;

    protected $fillable = [
        'nm_kategori',
        'deskripsi',
    ];
}
