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
        'judul_foto', // Added missing field
        'foto_lainnya', // Stored as JSON
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
        'jenis_bangunan', // Added missing field
        'jenis_bangunan_indeks_lantai', // Added missing field
        'tahun_dibangun',
        'tahun_renovasi',
        'jenis_renovasi',
        'bobot_renovasi',
        'kondisi_visual',
        'catatan_khusus',
        'luas_bangunan_terpotong',
        'luas_bangunan_imb',
        'luas_nama_pintu_jendela', // Stored as JSON
        'luas_bobot_pintu_jendela', // Stored as JSON
        'luas_nama_dinding', // Stored as JSON
        'luas_bobot_dinding', // Stored as JSON
        'luas_nama_rangka_atap_datar', // Stored as JSON
        'luas_bobot_rangka_atap_datar', // Stored as JSON
        'luas_nama_atap_datar', // Stored as JSON
        'luas_bobot_atap_datar', // Stored as JSON
        'tipe_pondasi_existing', // Stored as JSON
        'bobot_tipe_pondasi_existing', // Stored as JSON
        'tipe_struktur_existing', // Stored as JSON
        'bobot_tipe_struktur_existing', // Stored as JSON
        'tipe_rangka_atap_existing', // Stored as JSON
        'bobot_rangka_atap_existing', // Stored as JSON
        'tipe_penutup_atap_existing', // Stored as JSON
        'bobot_penutup_atap_existing', // Stored as JSON
        'tipe_tipe_dinding_existing', // Stored as JSON
        'bobot_tipe_dinding_existing', // Stored as JSON
        'tipe_tipe_pelapis_dinding_existing', // Stored as JSON
        'bobot_tipe_pelapis_dinding_existing', // Stored as JSON
        'tipe_tipe_pintu_jendela_existing', // Stored as JSON
        'bobot_tipe_pintu_jendela_existing', // Stored as JSON
        'tipe_tipe_lantai_existing', // Stored as JSON
        'bobot_tipe_lantai_existing', // Stored as JSON
        'penggunaan_bangunan',
        'perlengkapan_bangunan', // Stored as JSON
        'progres_pembangunan',
        'kondisi_bangunan',
        'status_data',
    ];

    /**
     * Tipe casting untuk kolom JSON.
     */
    // protected $casts = [
    //     'foto_lainnya' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'dynamic_data' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'perlengkapan_bangunan' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'luas_nama_pintu_jendela' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'luas_bobot_pintu_jendela' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'luas_nama_dinding' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'luas_bobot_dinding' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_pondasi_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_pondasi_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_struktur_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_struktur_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_rangka_atap_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_rangka_atap_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_penutup_atap_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_penutup_atap_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_tipe_dinding_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_dinding_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_tipe_pelapis_dinding_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_pelapis_dinding_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_tipe_pintu_jendela_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_pintu_jendela_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'tipe_tipe_lantai_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    //     'bobot_tipe_lantai_existing' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
    // ];


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
                'url' => $foto['foto'] ? asset('storage/' . $foto['foto']) : null,
            ];
        });
    }

    /**
     * Aksesor untuk mendapatkan data dinamis (dynamic_data) sebagai array.
     */
    public function getDynamicDataAttribute($value)
    {
        return json_decode($value, true); // Ensure dynamic_data is decoded as array
    }

    /**
     * Aksesor untuk mendapatkan nilai perlengkapan bangunan dalam format array.
     */
    public function getPerlengkapanBangunanAttribute($value)
    {
        return json_decode($value, true); // Ensure perlengkapan_bangunan is decoded as array
    }

    // Add similar accessors for other JSON fields if needed
    public function getLuasNamaPintuJendelaAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getLuasBobotPintuJendelaAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getLuasNamaDindingAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getLuasBobotDindingAttribute($value)
    {
        return json_decode($value, true);
    }

    // Continue adding accessors for the remaining fields...
}
