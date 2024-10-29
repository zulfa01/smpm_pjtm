<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataGuru;

class DataGuruController extends Controller
{
    // Tampilkan semua data guru di halaman admin dengan pagination
    public function index()
    {
        $data_guru = DataGuru::orderBy('id', 'asc')->paginate(10); // Sesuaikan jumlah data per halaman
        return view('admin.data_guru.index', compact('data_guru'));
    }

    // Tampilkan halaman detail untuk guru tertentu
    public function show($id)
    {
        $guru = DataGuru::findOrFail($id);
        return view('admin.data_guru.show', compact('guru'));
    }

    // Tampilkan form untuk menambah data guru
    public function create()
    {
        return view('admin.data_guru.create');
    }

    // Simpan data guru baru ke database
public function store(Request $request)
{
    $request->validate([
        'nama' => 'nullable|string|max:255',
        'jabatan' => 'nullable|string',
        'mata_pelajaran' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $fileName = null;
    if ($request->hasFile('foto')) {
        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads/guru'), $fileName);
    }

    DataGuru::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'mata_pelajaran' => $request->mata_pelajaran,
        'foto' => $fileName,
    ]);

    return redirect()->route('admin.data_guru.index')->with('success', 'Data guru berhasil ditambahkan!');
}

// Update data guru di database
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'nullable|string|max:255',
        'jabatan' => 'nullable|string',
        'mata_pelajaran' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data_guru = DataGuru::findOrFail($id);

    if ($request->hasFile('foto')) {
        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads/guru'), $fileName);
        $data_guru->foto = $fileName;
    }

    $data_guru->update([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'mata_pelajaran' => $request->mata_pelajaran,
    ]);

    return redirect()->route('admin.data_guru.index')->with('success', 'Data guru berhasil diperbarui!');
}

    // Hapus data guru
    public function destroy($id)
    {
        $data_guru = DataGuru::findOrFail($id);
        $data_guru->delete();

        return redirect()->route('admin.data_guru.index')->with('success', 'Data guru berhasil dihapus!');
    }

    public function edit($id)
    {
        // Ambil data guru berdasarkan ID
        $dataGuru = DataGuru::findOrFail($id);

        // Kembalikan tampilan edit dengan data guru
        return view('admin.data_guru.edit', compact('dataGuru'));
    }
}
