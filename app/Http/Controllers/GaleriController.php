<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::paginate(10); // Pastikan ini menggunakan paginate()
        return view('galeri.index', compact('galeri')); // Pastikan variabel ini digunakan di view
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id); // Ambil galeri berdasarkan ID
        return view('galeri.show', compact('galeri')); // Tampilkan detail galeri
    }
}
