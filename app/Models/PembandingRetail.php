<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembandingRetail extends Model
{
    use HasFactory;

    protected $table = 'pembanding_retail';

    protected $fillable = [
        'nama_retail',
        'nama_entitas',
        'jenis_properti',
        'provinsi',
        'kode_pos',
        'alamat_lengkap',
        'alamat',
        'lat',
        'long',
        'kondisi_properti',
        'estimasi_properti',
        'spesifikasi_properti',
        'tipe_apartemen',
        'posisi_lantai',
        'jumlah_lantai',
        'row_koridor',
        'luas_bangunan_total',
        'fasilitas_bangunan',
        'grade_bangunan',
        'tipe_akses_koridor',
        'nilai_perolehan_njop',
        'foto_lainnya',
        'foto_tampak_depan',
        'foto_tampak_sisi_kiri',
        'foto_tampak_sisi_kanan',
        'narasumber',
        'jenis_dok_hak_tanah',
        'tgl_berakhir_dokumen',
        'peruntukan_bangunan',
        'jenis_data',
        'tgl_penawaran',
        'sumber_data',
        'luas_semigross',
        'luas_net',
        'harga_penawaran',
        'diskon',
        'harga_sewa_pertahun',
        'skrap',
        'penyusutan',
        'penyesuaian_elemen_perbandingan',
        'penggunaan',
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
        'karakteristik_ekonomi',
        'komponen_non_reality',
        'gambaran_objek',
        'keterangan_jarak',
        'pemberi_tugas',
        'jenis_aset',
        'peruntukan',
        'jenis_aset_campuran',
        'topografi_isian',
        'jabatan_narasumber',
        'status_data_pembanding',
    ];

    protected $casts = [
        'nilai_perolehan_njop' => 'array',
        'foto_lainnya' => 'array',
        'narasumber' => 'array',
        'penyusutan' => 'array',
        'penyesuaian_elemen_perbandingan' => 'array',
        'penggunaan' => 'array',
        'kondisi_lingkungan_khusus' => 'array',
        'karakteristik_ekonomi' => 'array',
        'komponen_non_reality' => 'array',
        'gambaran_objek' => 'array',
    ];
}
