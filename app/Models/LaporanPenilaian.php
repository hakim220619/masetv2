<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenilaian extends Model
{
    use HasFactory;

    protected $table = 'laporan_penilaian'; // Nama tabel

    protected $fillable = [
        'kategori_laporan_penilaian',
        'judul_laporan',
        'nama_entitas',
        'judul_print_cover',
        'versi_btb',
        'no_laporan_penilaian',
        'tgl_laporan_penilaian',
        'no_dokumen_kontrak',
        'tgl_dokumen_kontrak',
        'nama_instansi_pemberi_tugas',
        'key_kcp_pemberi_tugas',
        'cp_penugasan_pemberi_tugas',
        'telepon_pemberi_tugas',
        'tujuan_penilaian',
        'tujuan_spesifik',
        'nama_debitur',
        'nama_yang_dihubungi_debitur',
        'no_telepon_debitur',
        'nama_instansi_pengguna_laporan',
        'pilih_nama_instansi_pengguna_laporan',
        'alamat',
        'pengguna_laporan_khusus',
        'kategori_kredit',
        'kategori_kredit_bca',
        'tipe_jaminan',
        'lokasi_cabang_bank',
        'kota_bap_final',
        'pilih_nama_instansi_daerah_bap_final',
        'dasar_nilai_spesifik',
        'dasar_penilaian', // Disimpan dalam JSON
        'pendekatan_penilaian', // Disimpan dalam JSON
        'provinsi_obyek',
        'kabupaten_lokasi_obyek',
        'kecamatan_lokasi_obyek',
        'kelurahan_lokasi_obyek',
        'rt_rw_lokasi_obyek',
        'kode_pos_rt_rw_lokasi_obyek',
        'wil_admint2_lokasi_obyek',
        'wil_admint4_lokasi_obyek',
        'alamat_lokasi_obyek',
        'tanggal_inspeksi',
        'tanggal_penilaian',
        'tingkat_suku_bunga_suku_bunga_pinjaman',
        'sumberdata_suku_bunga_pinjaman',
        'screenshoot_sumber_suku_bunga_pinjaman',
        'admin_tim_penilai',
        'tim_penilai_qc',
        'penilai1_tim_penilai',
        'penilai2_tim_penilai',
        'reviewer_tim_penilai',
        'pj_tim_penilai',
        'nama_pendamping_inpeksi',
        'telepon_pendamping_inpeksi',
        'status_pendamping_inpeksi',
        'kelengkapan_dokumen', // Disimpan dalam JSON
        'tgl_izin_layak_huni',
        'no_izin_layak_huni',
        'tgl_akta_pemisahan',
        'no_akta_pemisahan',
        'dibuat_akta_pemisahan',
        'disahkan_oleh_akta_pemisahan',
        'tgl_disahkan_akta_pemisahan',
        'no_pengesahan_akta_pemisahan',
        'informasi_khusus',
        'status_data',
    ];

    protected $casts = [
        'dasar_penilaian' => 'array', // Karena datanya dalam bentuk checkbox (JSON)
        'pendekatan_penilaian' => 'array', // Karena bisa memilih lebih dari satu opsi (JSON)
        'kelengkapan_dokumen' => 'array', // Karena datanya dalam bentuk checkbox (JSON)
        'tgl_laporan_penilaian' => 'date',
        'tgl_dokumen_kontrak' => 'date',
        'tanggal_inspeksi' => 'date',
        'tanggal_penilaian' => 'date',
        'tgl_izin_layak_huni' => 'date',
        'tgl_akta_pemisahan' => 'date',
        'tgl_disahkan_akta_pemisahan' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
