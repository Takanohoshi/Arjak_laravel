<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dataartikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataartikelContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataartikel = Dataartikel::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $dataartikel->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orwhere('kategori', 'like', '%' . $search . '%')
                      ->orWhere('tahun', 'like', '%' . $search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }
    
        $dataartikel = $dataartikel->paginate(5); // Adjust the number of items per page as needed
        
    
        return view('admin.artikeldata.index', compact('dataartikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Kategori::all();
        $title = 'Create | Data';
        return view('admin.artikeldata.create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:100000',
        'judul' => 'required|string|max:255',
        'tahun' => 'required|integer',
        'kategori' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:100000', // Validasi multiple images
    ]);
    $username = Auth::user()->username;

        
        $covered = $request->file('cover');
        $filename = date('Y-m-d').$covered->getClientOriginalName();
        $path = 'cover/'.$filename;

        storage::disk('public')->put($path,file_get_contents($covered));

        $images = $request->file('cover');
        $filename = date('Y-m-d').$images->getClientOriginalName();
        $path = 'detail/'.$filename;

        storage::disk('public')->put($path,file_get_contents($images));

        $dataartikel = new Dataartikel;
        $dataartikel->cover = $filename;
        $dataartikel->judul = $validatedData['judul'];
        $dataartikel->tahun = $validatedData['tahun'];
        $dataartikel->kategori = $validatedData['kategori'];
        $dataartikel->deskripsi = $validatedData['deskripsi'];
        $dataartikel->image = $filename;
        $dataartikel->username = $username; // Simpan username

        $dataartikel->save();

        // Redirect ke halaman daftar artikel dengan pesan sukses
        return redirect()->route('artikeldata.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
