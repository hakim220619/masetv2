<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahKosong extends Model
{
    use HasFactory;

    // Tentukan nama tabel (opsional jika nama tabel sesuai konvensi Laravel)
    protected $table = 'tanah_kosong';

    // Daftar kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'nama_tanah_kosong',
        'nama_entitas',
        'provinsi',
        'kode_pos',
        'alamat_lengkap',
        'keterangan_dasar_nilai',
        'alamat',
        'lat',
        'long',
        'foto_tampak_depan',
        'foto_tampak_sisi_kiri',
        'foto_tampak_sisi_kanan',
        'foto_lainnya',
        'njop',
        'nama_narsum',
        'telepon',
        'jenis_dok_hak_tanah',
        'zona_lindung',
        'zona_budidaya',
        'jenis_data',
        'tgl_penawaran',
        'sumber_data',
        'luas_tanah',
        'luas_tanah_terpotong',
        'harga_penawaran',
        'diskon',
        'harga_sewa_per_tahun',
        'skrap',
        'kemunduran_fungsi',
        'penjelasan_kemunduran_fungsi',
        'kemunduran_ekonomis',
        'penjelasan_kemunduran_ekonomis',
        'maintenance',
        'pep_pembiayaan',
        'pep_penjualan',
        'pep_pengeluaran',
        'pep_pasar',
        'kdb',
        'klb',
        'gsb',
        'ketinggian',
        'row_jalan',
        'tipe_jalan',
        'kapasitas_jalan',
        'pengguna_lahan_lingkungan_eksisting',
        'letak_posisi_obyek',
        'letak_posisi_aset',
        'bentuk_tanah',
        'bentuk_tanah_lainnya',
        'lebar_muka_tanah',
        'ketinggian_tanah_dr_muka_jln',
        'topografi',
        'tingkat_hunian',
        'kondisi_lingkungan_khusus',
        'kondisi_lingkungan_lainnya',
        'keterangan_tambahan_lainnya',
        'kualitas_pendapatan',
        'biaya_operasional',
        'ketentuan_sewa',
        'manajemen',
        'bauran_penyewa',
        'ffe',
        'mesin',
        'nama_pusat_kota',
        'nama_pusat_ekonomi',
        'nama_jalan',
        'kondisi_lingkungan',
        'faktor_view',
        'keterangan_jarak',
        'pengguanan_tnh_saat_ini',
        'pemberi_tugas',
        'jenis_aset',
        'peruntukan',
        'jabatan_narasumber',
        'status_data_pembanding',
    ];

    /**
     * Casting attributes to their types.
     */
    protected $casts = [
        'foto_lainnya' => 'array', // Karena foto_lainnya disimpan sebagai JSON
        'njop' => 'array',         // Karena njop disimpan sebagai JSON
        'lat' => 'float',
        'long' => 'float',
        'luas_tanah' => 'integer',
        'luas_tanah_terpotong' => 'integer',
        'harga_penawaran' => 'float',
        'harga_sewa_per_tahun' => 'float',
        'skrap' => 'integer',
        'kemunduran_fungsi' => 'integer',
        'kemunduran_ekonomis' => 'integer',
        'maintenance' => 'integer',
        'diskon' => 'integer',
        'tingkat_hunian' => 'integer',
        'kdb' => 'integer',
        'klb' => 'integer',
        'gsb' => 'integer',
        'ketinggian' => 'integer',
        'row_jalan' => 'integer',
    ];

    /**
     * Accessor for formatted alamat.
     */
    public function getFullAddressAttribute()
    {
        return "{$this->alamat}, {$this->provinsi}, {$this->kode_pos}";
    }

    /**
     * Mutator for lat and long to ensure precision.
     */
    public function setLatAttribute($value)
    {
        $this->attributes['lat'] = round($value, 8);
    }

    public function setLongAttribute($value)
    {
        $this->attributes['long'] = round($value, 8);
    }

}
