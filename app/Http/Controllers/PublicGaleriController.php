<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri; // Pastikan Anda mengimpor model Galeri

class PublicGaleriController extends Controller
{
    // Tampilkan daftar semua galeri dengan pagination
    public function index()
    {
        // Mengurutkan galeri berdasarkan judul secara ascending, dan pagination 6 per halaman
        $galeri = Galeri::orderBy('judul', 'asc')->paginate(6); 
        return view('galeri.index', compact('galeri')); // Ubah 'galeri' menjadi 'galeris' jika diperlukan
    }

    // Tampilkan detail galeri tertentu berdasarkan ID
    public function show($id)
    {
        // Mencari galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id); 
        return view('galeri.show', compact('galeri')); 
    }

    // Melakukan pencarian galeri berdasarkan judul atau keterangan
    public function search(Request $request)
    {
        // Validasi input pencarian (opsional)
        $request->validate([
            'keyword' => 'required|string|max:255', // Pastikan keyword tidak kosong dan merupakan string
        ]);

        // Mencari galeri berdasarkan keyword di judul atau keterangan
        // Urutkan hasil pencarian berdasarkan judul secara ascending
        $galeri = Galeri::where(function($query) use ($request) {
            $query->where('judul', 'like', '%' . $request->keyword . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->keyword . '%');
        })->orderBy('judul', 'asc')->paginate(6); // Tetapkan urutan dan pagination

        return view('galeri.index', compact('galeri')); // Ubah 'galeri' menjadi 'galeris' jika diperlukan
    }
}
