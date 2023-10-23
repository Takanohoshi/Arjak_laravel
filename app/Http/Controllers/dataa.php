<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataartikel;

class dataa extends Controller
{
    public function index(Request $request)
    {
        // Dapatkan inputan pencarian dari request
        $search = $request->input('search');

        // Cek apakah ada inputan pencarian
        if ($search) {
            // Jika ada pencarian, cari artikel berdasarkan judul atau deskripsi yang cocok
            $data = Dataartikel::where('judul', 'like', '%' . $search . '%')
                ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $data = Dataartikel::all();
        }

        return view('home', compact('data'));
    }

}
