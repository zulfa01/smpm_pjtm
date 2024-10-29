<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataGuru;

class DataGuruController extends Controller
{
    // Tampilkan daftar semua data guru dengan pagination
    public function index()
    {
        // Mengurutkan data guru berdasarkan ID secara ascending, dan pagination 4 per halaman
        $data_guru = DataGuru::orderBy('id', 'asc')->paginate(6); 
        return view('data-guru.index', compact('data_guru')); 
    }

    // Tampilkan detail data guru tertentu berdasarkan ID
    public function show($id)
    {
        // Mencari data guru berdasarkan ID
        $data_guru = DataGuru::findOrFail($id); 
        return view('data-guru.show', compact('data_guru')); 
    }

    // Melakukan pencarian data guru berdasarkan nama, jabatan, atau mata pelajaran
    public function search(Request $request)
    {
        // Mencari data guru berdasarkan keyword di nama, jabatan, atau mata pelajaran
        // Urutkan hasil pencarian berdasarkan ID secara ascending
        $data_guru = DataGuru::where(function($query) use ($request) {
            $query->where('nama', 'like', '%' . $request->keyword . '%')
                  ->orWhere('jabatan', 'like', '%' . $request->keyword . '%')
                  ->orWhere('mata_pelajaran', 'like', '%' . $request->keyword . '%');
        })->orderBy('id', 'asc')->paginate(4); // Tetapkan urutan dan pagination

        return view('data-guru.index', compact('data_guru')); 
    }
}
