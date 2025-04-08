<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import ini!
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory; // Pastikan ini ada

    protected $table = 'pasiens';
    protected $fillable = ['photo','no_pasien', 'nama', 'umur', 'jenis_kelamin', 'alamat'];
    protected $guarded = [];
}
