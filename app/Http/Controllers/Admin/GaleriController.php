<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri; // Pastikan Anda mengimpor model Galeri
use Illuminate\Support\Facades\File; // Impor Facade File untuk menghapus file

class GaleriController extends Controller
{
    // Tampilkan semua data galeri di halaman admin dengan pagination
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(10); // Menggunakan created_at untuk pengurutan
        return view('admin.galeri.index', compact('galeri')); 
    }

    // Tampilkan halaman detail untuk galeri tertentu
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('galeri'));
    }

    // Tampilkan form untuk menambah data galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan data galeri baru ke database
    public function store(Request $request)
    {
        // Validasi hanya untuk judul dan foto
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menggunakan time() untuk memastikan nama file unik
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('uploads/galeri'), $fileName);

        // Buat data galeri baru
        Galeri::create([
            'judul' => $request->judul,
            'foto' => $fileName,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Update data galeri di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil data galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Jika ada file foto baru, proses upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($galeri->foto) {
                // Hapus foto dari server
                File::delete(public_path('uploads/galeri/' . $galeri->foto));
            }

            // Simpan foto baru
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/galeri'), $fileName);
            $galeri->foto = $fileName; // Update nama file foto
        }

        // Update data galeri
        $galeri->update([
            'judul' => $request->judul,
            // Pastikan keterangan didefinisikan jika ada di database
            'keterangan' => $request->input('keterangan'), 
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    // Hapus data galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus foto dari server jika ada
        if ($galeri->foto) {
            File::delete(public_path('uploads/galeri/' . $galeri->foto));
        }

        // Hapus data galeri dari database
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil dihapus!');
    }

    // Tampilkan form untuk mengedit data galeri
    public function edit($id)
    {
        // Ambil data galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Kembalikan tampilan edit dengan data galeri
        return view('admin.galeri.edit', compact('galeri'));
    }
}