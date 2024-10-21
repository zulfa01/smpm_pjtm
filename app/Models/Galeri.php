<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri'; // Menyebutkan nama tabel yang benar

    protected $fillable = ['judul', 'deskripsi', 'foto', 'user_id']; // Pastikan kolom ini sesuai

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk mendapatkan URL foto
    public function getFotoUrl()
    {
        // Mengembalikan URL ke folder uploads/galeri/ untuk menampilkan foto
        if ($this->foto) {
            return asset('uploads/galeri/' . $this->foto); // Path yang benar ke folder gambar
        }

        // Jika tidak ada gambar, kembalikan gambar default (opsional)
        return asset('images/default.jpg');
    }
}
