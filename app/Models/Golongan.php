<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';
    protected $fillable = ['kode_gol_yang_berlaku', 'periode_mulai_berlaku', 'kode_gol', 'golongan', 'kategori', 'uraian', 'administrasi', 'pemeliharaan', 'pelayanan', 'retribusi', 'denda_pakai_0', 'denda_tunggakan', 'denda_tunggakan_2', 'denda_tunggakan_3', 'denda_tunggakan_4', 'denda_tunggakan_per_bulan', 'air_limbah', 'min_pakai', 'ppn', 'bb1', 'ba1', 'bb2', 'ba2', 'bb3', 'ba3', 'bb4', 'ba4', 'bb5', 'ba5', 't1',  't2', 't3', 't4', 't5', 't1_tetap', 't2_tetap', 't3_tetap', 't4_tetap', 't5_tetap', 'nomor_ba', 'aktif', 'retribusi_pakai', 'min_denda', 'trf_denda_berdasarkan_persen'];

    static function getGolongan() {
        return Golongan::all();
    }
}
