<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $table = 'rayon';
    protected $fillable = ['kode_rayon', 'nama_rayon', 'kode_area', 'area', 'kode_wil', 'wilayah', 'kode_loket'];
}
