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
        // Add any other fields that are arrays or JSON
        'luas_nama_pintu_jendela',
        'luas_bobot_pintu_jendela',
        'luas_nama_dinding',
        'luas_bobot_dinding',
        'tipe_pondasi_existing',
        'bobot_tipe_pondasi_existing',
        'tipe_struktur_existing',
        'bobot_tipe_struktur_existing',
        'tipe_rangka_atap_existing',
        'bobot_rangka_atap_existing',
        'tipe_penutup_atap_existing',
        'bobot_penutup_atap_existing',
        'tipe_tipe_dinding_existing',
        'bobot_tipe_dinding_existing',
        'tipe_tipe_pelapis_dinding_existing',
        'bobot_tipe_pelapis_dinding_existing',
        'tipe_tipe_pintu_jendela_existing',
        'bobot_tipe_pintu_jendela_existing',
        'tipe_tipe_lantai_existing',
        'bobot_tipe_lantai_existing',
    ];

    /**
     * Tipe casting untuk kolom JSON.
     */
    protected $casts = [
        'foto_lainnya' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
        'dynamic_data' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
        'perlengkapan_bangunan' => 'array', // Akan otomatis dikonversi menjadi array saat diakses
        'luas_nama_pintu_jendela' => 'array',
        'luas_bobot_pintu_jendela' => 'array',
        'luas_nama_dinding' => 'array',
        'luas_bobot_dinding' => 'array',
        'tipe_pondasi_existing' => 'array',
        'bobot_tipe_pondasi_existing' => 'array',
        'tipe_struktur_existing' => 'array',
        'bobot_tipe_struktur_existing' => 'array',
        'tipe_rangka_atap_existing' => 'array',
        'bobot_rangka_atap_existing' => 'array',
        'tipe_penutup_atap_existing' => 'array',
        'bobot_penutup_atap_existing' => 'array',
        'tipe_tipe_dinding_existing' => 'array',
        'bobot_tipe_dinding_existing' => 'array',
        'tipe_tipe_pelapis_dinding_existing' => 'array',
        'bobot_tipe_pelapis_dinding_existing' => 'array',
        'tipe_tipe_pintu_jendela_existing' => 'array',
        'bobot_tipe_pintu_jendela_existing' => 'array',
        'tipe_tipe_lantai_existing' => 'array',
        'bobot_tipe_lantai_existing' => 'array',
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
