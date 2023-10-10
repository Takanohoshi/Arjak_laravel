<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataartikel extends Model
{
    protected $table = 'dataartikel';
    use HasFactory;

    protected $fillable = [
        'cover',
        'judul',
        'tahun',
        'kategori',
        'deskripsi',
        'image',
    ];
}
