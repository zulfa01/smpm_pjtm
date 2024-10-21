<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataGuru;

class DataGuruController extends Controller
{
    // Tampilkan daftar semua data guru dengan pagination
    public function index()
    {
        $data_guru = DataGuru::latest()->paginate(4); // Ambil data guru terbaru
        return view('data-guru.index', compact('data_guru')); // Tampilkan ke view
    }

    // Tampilkan detail data guru tertentu
    public function show($id) // Menggunakan parameter $id
    {
        $data_guru = DataGuru::findOrFail($id); // Ambil data guru berdasarkan ID
        return view('data-guru.show', compact('data_guru')); // Tampilkan detail guru
    }

    // Melakukan pencarian data guru berdasarkan nama, jabatan, atau mata pelajaran
    public function search(Request $request)
    {
        $data_guru = DataGuru::where(function($query) use ($request) {
            $query->where('nama', 'like', '%' . $request->keyword . '%')
                  ->orWhere('jabatan', 'like', '%' . $request->keyword . '%')
                  ->orWhere('mata_pelajaran', 'like', '%' . $request->keyword . '%');
        })->paginate(4); // Pagination

        return view('data-guru.index', compact('data_guru')); // Tampilkan hasil pencarian
    }
}
