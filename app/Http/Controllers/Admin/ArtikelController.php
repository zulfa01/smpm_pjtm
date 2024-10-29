<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ArtikelDeleteEvent;
use App\Services\SummernoteService;
use App\Services\UploadService;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    private $summernoteService;
    private $uploadService;

    public function __construct(SummernoteService $summernoteService, UploadService $uploadService)
    {
        $this->summernoteService = $summernoteService;
        $this->uploadService = $uploadService;
    }

    // Tampilkan semua artikel di halaman admin dengan pagination
    public function index()
    {
        $artikel = Artikel::with(['user', 'kategoriArtikel'])->paginate(10); // Sesuaikan jumlah data per halaman
        return view('admin.artikel.index', compact('artikel'));
    }

    // Tampilkan halaman detail untuk artikel tertentu
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    // Tampilkan form untuk menambah artikel
    public function create()
    {
        $kategoriArtikel = KategoriArtikel::all();
        return view('admin.artikel.create', compact('kategoriArtikel'));
    }

    // Simpan artikel baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_artikel_id' => 'required|exists:kategori_artikel,id',
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('artikel'),
            'thumbnail' => $this->uploadService->imageUpload('artikel'),
            'slug' => Str::slug($request->judul),
            'user_id' => auth()->user()->id,
            'kategori_artikel_id' => $request->kategori_artikel_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil ditambah');
    }

    // Tampilkan form untuk mengedit artikel
    public function edit(Artikel $artikel)
    {
        $kategoriArtikel = KategoriArtikel::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoriArtikel'));
    }

    // Update artikel di database
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_artikel_id' => 'required|exists:kategori_artikel,id',
        ]);

        $this->authorize('update', $artikel);

        $artikel->update([
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('artikel'),
            'thumbnail' => $this->uploadService->imageUpload('artikel'),
            'slug' => Str::slug($request->judul),
            'user_id' => auth()->user()->id,
            'kategori_artikel_id' => $request->kategori_artikel_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil diupdate');
    }

    // Hapus artikel
    public function destroy(Artikel $artikel)
    {
        $this->authorize('delete', $artikel);

        event(new ArtikelDeleteEvent($artikel));

        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Data berhasil dihapus');
    }
}
