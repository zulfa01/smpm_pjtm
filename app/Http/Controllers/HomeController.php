<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\DataGuru;
use App\Models\Pengumuman;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'agenda' => Agenda::latest()->take(2)->get(),
            'artikel' => Artikel::with(['user', 'kategoriArtikel'])->latest()->take(2)->get(),
            'pengumuman' => Pengumuman::with(['user'])->latest()->take(2)->get(),
            'data_guru' => DataGuru::with(['user'])->latest()->take(2)->get(),
            'galeri' => Galeri::latest()->take(2)->get(), // Hapus with(['user'])
        ]);
    }

    public function about()
    {
    	return view('home.about');
    }

    public function contact()
    {
    	return view('home.contact');
    }
}
