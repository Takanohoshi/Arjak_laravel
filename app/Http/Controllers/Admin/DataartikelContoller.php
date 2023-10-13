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
        $dataartikel = Dataartikel::paginate(10);
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
                    // Tambahkan metode orderBy untuk mengurutkan data berdasarkan kolom created_at (atau yang lain sesuai kebutuhan)
                    $dataartikel->orderBy('created_at', 'desc');
                    // Eksekusi query dan ambil hasilnya menggunakan ->get()
                    $dataartikel = $dataartikel->get();
    
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
        // Aturan validasi
        $rules = [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:100000',
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:100000', // Validasi file PDF
        ];

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate($rules);

        // Dapatkan username pengguna yang saat ini login
        $username = Auth::user()->username;

        // Ambil file cover dan file PDF dari request
        $covered = $request->file('cover');
        $pdf = $request->file('pdf');
        
        // Generate nama file unik berdasarkan tanggal
        $coverFilename = date('Y-m-d') . $covered->getClientOriginalName();
        $pdfFilename = date('Y-m-d') . $pdf->getClientOriginalName();

        // Tentukan path penyimpanan untuk file cover dan file PDF
        $coverPath = 'cover/' . $coverFilename;
        $pdfPath = 'pdf/' . $pdfFilename;

        // Simpan file cover
        Storage::disk('public')->put($coverPath, file_get_contents($covered));
        
        // Simpan file PDF
        Storage::disk('public')->put($pdfPath, file_get_contents($pdf));

        // Buat objek Dataartikel dan simpan ke database
        Dataartikel::create([
            'cover' => $coverFilename,
            'pdf' => $pdfFilename,
            'judul' => $validatedData['judul'],
            'tahun' => $validatedData['tahun'],
            'kategori' => $validatedData['kategori'],
            'deskripsi' => $validatedData['deskripsi'],
            'username' => $username,
        ]);

        // Redirect ke halaman daftar artikel dengan pesan sukses
        return redirect()->route('artikeldata.index')->with('success', 'Artikel berhasil ditambahkan');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(Dataartikel $dataartikel)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataartikel = Dataartikel::find($id);
        $title = 'Create | Data';
        return view('admin.artikeldata.edit', compact(['dataartikel', 'title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dataartikel $dataartikel,string $id)
    {
        // Aturan validasi
        $rules = [
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:100000',
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pdf' => 'mimes:pdf|max:100000', // Validasi file PDF
        ];
    
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate($rules);
    
        // Dapatkan username pengguna yang saat ini login
        $username = Auth::user()->username;
    
        // Cek apakah pengguna mengunggah file cover baru
        if ($request->hasFile('cover')) {
            // Hapus file cover lama jika ada
            Storage::disk('public')->delete('cover/' . $dataartikel->cover);
    
            // Ambil file cover baru dari request
            $covered = $request->file('cover');
    
            // Generate nama file unik berdasarkan tanggal
            $coverFilename = date('Y-m-d') . $covered->getClientOriginalName();
    
            // Tentukan path penyimpanan untuk file cover baru
            $coverPath = 'cover/' . $coverFilename;
    
            // Simpan file cover baru
            Storage::disk('public')->put($coverPath, file_get_contents($covered));
    
            // Update nama file cover dalam data artikel
            $dataartikel->cover = $coverFilename;
        }
    
        // Cek apakah pengguna mengunggah file PDF baru
        if ($request->hasFile('pdf')) {
            // Hapus file PDF lama jika ada
            Storage::disk('public')->delete('pdf/' . $dataartikel->pdf);
    
            // Ambil file PDF baru dari request
            $pdf = $request->file('pdf');
    
            // Generate nama file unik berdasarkan tanggal
            $pdfFilename = date('Y-m-d') . $pdf->getClientOriginalName();
    
            // Tentukan path penyimpanan untuk file PDF baru
            $pdfPath = 'pdf/' . $pdfFilename;
    
            // Simpan file PDF baru
            Storage::disk('public')->put($pdfPath, file_get_contents($pdf));
    
            // Update nama file PDF dalam data artikel
            $dataartikel->pdf = $pdfFilename;
        }
    
        // Simpan perubahan data artikel setelah mengupdate file cover dan PDF
        $dataartikel = Dataartikel::find($id);
        $dataartikel->judul = $validatedData['judul'];
        $dataartikel->tahun = $validatedData['tahun'];
        $dataartikel->kategori = $validatedData['kategori'];
        $dataartikel->deskripsi = $validatedData['deskripsi'];
        $dataartikel->username = $username;
        $dataartikel->save();
    
        // Redirect ke halaman daftar artikel dengan pesan sukses
        return redirect()->route('artikeldata.index')->with('success', 'Artikel berhasil diperbarui');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataartikel $dataartikel, string $id)
    {
        $dataartikel = Dataartikel::find($id);

        Dataartikel::destroy($dataartikel->id);
    // Redirect ke halaman daftar artikel dengan pesan sukses
    return redirect()->route('artikeldata.index')->with('success', 'Artikel berhasil dihapus');
    }
}
