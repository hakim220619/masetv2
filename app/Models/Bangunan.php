<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;
    protected $table = 'bangunan';

    protected $fillable = [
        'nama_bangunan',
        'foto_depan',
        'foto_sisi_kiri',
        'foto_sisi_kanan',
        'foto_lainnya', // Disimpan sebagai JSON
        'dynamic_data', // Data dari @include disimpan sebagai JSON
        'bentuk_bangunan',
        'jumlah_lantai',
        'basement',
        'konstruksi_bangunan',
        'konstruksi_lantai',
        'konstruksi_dinding',
        'konstruksi_atap',
        'konstruksi_pondasi',
        'versi_btb',
        'tipe_spek',
        'penggunaan_bangunan',
        'perlengkapan_bangunan', // Disimpan sebagai JSON
        'progres_pembangunan',
        'kondisi_bangunan',
        'status_data',
    ];

    /**
     * Tipe casting untuk kolom JSON.
     */
    protected $casts = [
        'foto_lainnya' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
        'dynamic_data' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
        'perlengkapan_bangunan' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    ];

    /**
     * Aksesor untuk mendapatkan URL foto depan.
     */
    public function getFotoDepanUrlAttribute()
    {
        return $this->foto_depan ? asset('storage/' . $this->foto_depan) : null;
    }

    /**
     * Aksesor untuk mendapatkan URL foto sisi kiri.
     */
    public function getFotoSisiKiriUrlAttribute()
    {
        return $this->foto_sisi_kiri ? asset('storage/' . $this->foto_sisi_kiri) : null;
    }

    /**
     * Aksesor untuk mendapatkan URL foto sisi kanan.
     */
    public function getFotoSisiKananUrlAttribute()
    {
        return $this->foto_sisi_kanan ? asset('storage/' . $this->foto_sisi_kanan) : null;
    }

    /**
     * Aksesor untuk mendapatkan URL setiap foto lainnya.
     */
    public function getFotoLainnyaUrlsAttribute()
    {
        return collect($this->foto_lainnya)->map(function ($foto) {
            return [
                'judul' => $foto['judul'],
                'url' => asset('storage/' . $foto['foto']),
            ];
        });
    }
}
