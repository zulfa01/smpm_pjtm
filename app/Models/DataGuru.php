<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DataGuru extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'data_guru';

    // Field yang boleh diisi
    protected $fillable = [
        'nama', 
        'jabatan', 
        'mata_pelajaran', 
        'foto',
    ];

    /**
     * Relasi ke model User
     * Satu guru memiliki satu user (misalnya admin atau user yang ditugaskan)
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi many-to-one
    }

    /**
     * Method untuk mendapatkan URL foto guru.
     * Memeriksa apakah field foto tidak null sebelum mengembalikan URL.
     * Mengembalikan URL foto jika ada, atau gambar default jika tidak ada.
     */
    public function getFotoUrl()
    {
        return $this->foto 
            ? asset('uploads/guru/' . $this->foto) // URL lengkap untuk foto
            : asset('images/default.png'); // Gambar default jika foto tidak ada
    }
}
