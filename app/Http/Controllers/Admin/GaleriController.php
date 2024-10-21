<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Str; // Perbaiki penulisan Illuminate

class GaleriController extends Controller
{
    // Tampilkan semua data galeri di halaman admin dengan pagination
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10); // Mengambil data galeri terbaru dengan pagination
        return view('admin.galeri.index', compact('galeri'));
    }

    // Tampilkan halaman detail untuk galeri tertentu
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id); // Ambil galeri berdasarkan ID
        return view('admin.galeri.show', compact('galeri')); // Tampilkan detail galeri
    }

    // Tampilkan form untuk menambah data galeri
    public function create()
    {
        return view('admin.galeri.create'); // Tampilkan form untuk menambah galeri
    }

    // Simpan data galeri baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload file
        $fileName = time() . '.' . $request->thumbnail->extension(); // Buat nama file
        $request->thumbnail->move(public_path('uploads/galeri'), $fileName); // Pindahkan ke folder uploads

        // Simpan data galeri ke database, hanya path dari thumbnail
        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $fileName, // Simpan nama file thumbnail saja
            'slug' => Str::slug($request->judul),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil ditambahkan!');
    }

    // Tampilkan form untuk mengedit data galeri
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id); // Ambil galeri berdasarkan ID
        return view('admin.galeri.edit', compact('galeri')); // Tampilkan form edit
    }

    // Update data galeri di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255', // Validasi judul
            'deskripsi' => 'nullable|string', // Validasi deskripsi
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi thumbnail
        ]);

        $galeri = Galeri::findOrFail($id); // Ambil galeri berdasarkan ID

        // Jika ada file thumbnail baru yang diupload
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '.' . $request->thumbnail->extension(); // Buat nama file thumbnail baru
            $request->thumbnail->move(public_path('uploads/galeri'), $fileName); // Pindahkan file ke folder uploads
            $galeri->thumbnail = $fileName; // Update nama file thumbnail
        }

        // Update data galeri
        $galeri->update([
            'judul' => $request->judul, // Update judul
            'deskripsi' => $request->deskripsi, // Update deskripsi
            'slug' => Str::slug($request->judul), // Update slug
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diperbarui!'); // Redirect setelah berhasil
    }

    // Hapus data galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id); // Ambil galeri berdasarkan ID
        $galeri->delete(); // Hapus galeri

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil dihapus!'); // Redirect setelah berhasil
    }
}
