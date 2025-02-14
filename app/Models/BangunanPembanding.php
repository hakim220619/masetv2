<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunanPembanding extends Model
{
    use HasFactory;
    protected $table = 'pembanding_bangunan';

    protected $fillable = [
        // Data Umum
        'nama_bangunan',
        'nama_kjpp',
        'provinsi',
        'kode_pos',
        'alamat_lengkap',
        'jenis_properti',
        'id_jenis_bangunan',
        'kpt_tabel_analisis_ruko',
        'kdn_tabel_analisis',
        'lat',
        'long',
        'alamat',

        // Foto-foto
        'foto_tampak_depan',
        'foto_tampak_sisi_kiri',
        'foto_tampak_sisi_kanan',
        'judul_foto',
        'foto_lainnya',

        // NJOP/PBB
        'tahun_nilai_njop',

        // Narasumber
        'nama_narsum',
        'telepon',

        // Dokumen & Peruntukan
        'jenis_dok_hak_tanah',
        'zona_lindung',
        'zona_budidaya',

        // Data Transaksi
        'jenis_data',
        'tgl_penawaran',
        'sumber_data',
        'luas_tanah',
        'luas_tanah_terpotong',
        'luas_bangunan',
        'harga_penawaran',
        'diskon',
        'harga_sewa_per_tahun',
        'skrap',

        // Penyusutan
        'kemunduran_fungsi',
        'penjelasan_kemunduran_fungsi',
        'kemunduran_ekonomis',
        'penjelasan_kemunduran_ekonomis',
        'maintenance',

        // Penyesuaian Elemen
        'pep_pembiayaan',
        'pep_penjualan',
        'pep_pengeluaran',
        'pep_pasar',

        // Penggunaan & Koefisien
        'koefisien_dasar_bangunan',
        'koefisien_lantai_bangunan',
        'garis_sempadan_bangunan',
        'ketinggian',
        'row_jalan',
        'tipe_jalan',
        'kapasitas_jalan',
        'pengguna_lahan_lingkungan_eksisting',
        'letak_posisi_obyek',
        'lokasi_aset',

        // Karakteristik Tanah
        'bentuk_tanah',
        'lebar_muka_tanah',
        'ketinggian_tanah_dr_muka_jln',
        'topografi',
        'tingkat_hunian',
        'kondisi_lingkungan_khusus',
        'kondisi_lingkungan_lainnya',
        'keterangan_tambahan_lainnya',

        // Karakteristik Ekonomi
        'kualitas_pendapatan',
        'biaya_opreasional_ekonomi',
        'ketentuan_sewa',
        'manajemen',
        'bauran_penyewa',

        // Komponen Non-Realty
        'ffe',
        'biaya_operasional',

        // Gambaran Objek
        'nm_pusat_kota',
        'nm_pusat_ekonomi',
        'nm_jalan',
        'kondisi_lingkungan',
        'pemandangan',
        'keterangan_jarak_dr_bca',

        // Data Bangunan
        'bentuk_bangunan',
        'jumlah_lantai',
        'basement',
        'kontruksi_bangunan',
        'kontruksi_lantai',
        'kontruksi_dinding',
        'kontruksi_atap',
        'kontruksi_pondasi',
        'versi_btb',
        'tipe_spek',
        'grade_gudang',
        'jenis_bangunan',
        'jenis_bangunan_detail',
        'jumlah_lantai_rumah_tinggal',
        'jenis_bangunan_indeks_lantai', // Added missing field
        'tahun_dibangun',
        'keterangan_tahun_dibangun',
        'tahun_renovasi',
        'keterangan_tahun_direnovasi',
        'jenis_renovasi',
        'bobot_renovasi',
        'kondisi_visual',
        'catatan_khusus',
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
        'bobot_tipe_lantai_existing',
        'penggunaan_bangunan',
        'perlengkapan_bangunan',
        'progres_pembangunan',
        'kondisi_bangunan',

        // Data Pemberi Tugas
        'pemberi_tugas',
        'jenis_aset',
        'peruntukan',
        'jenis_aset_lainnya',
        'jabatan_narasumber',

        'status_data_pembanding'
    ];

    protected $casts = [
        'tahun_nilai_njop' => 'array',
        'foto_lainnya' => 'array',
        'kondisi_lingkungan_khusus' => 'array',
        'perlengkapan_bangunan' => 'array',
        'luas_nama_pintu_jendela' => 'array',
        'luas_bobot_pintu_jendela' => 'array',
        'luas_nama_dinding' => 'array',
        'luas_bobot_dinding' => 'array',
        'luas_nama_rangka_atap_datar' => 'array',
        'luas_bobot_rangka_atap_datar' => 'array',
        'luas_nama_atap_datar' => 'array',
        'luas_bobot_atap_datar' => 'array',
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
        'keterangan_tahun_dibangun' => 'array',
        'keterangan_tahun_direnovasi' => 'array',
        'jenis_bangunan_detail' => 'array'
    ];

    // Accessor untuk URL foto
    public function getFotoTampakDepanUrlAttribute()
    {
        return $this->foto_tampak_depan ? asset('storage/' . $this->foto_tampak_depan) : null;
    }

    public function getFotoTampakSisiKiriUrlAttribute()
    {
        return $this->foto_tampak_sisi_kiri ? asset('storage/' . $this->foto_tampak_sisi_kiri) : null;
    }

    public function getFotoTampakSisiKananUrlAttribute()
    {
        return $this->foto_tampak_sisi_kanan ? asset('storage/' . $this->foto_tampak_sisi_kanan) : null;
    }

    public function getFotoLainnyaUrlsAttribute()
    {
        if (!$this->foto_lainnya) return collect([]);

        return collect($this->foto_lainnya)->map(function ($foto) {
            return [
                'judul' => $foto['judul_foto'] ?? null,
                'url' => isset($foto['foto_lainnya']) ? asset('storage/' . $foto['foto_lainnya']) : null,
            ];
        });
    }

    public function getTahunNilaiNjopAttribute($value)
    {
        return json_decode($value, true);
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
}
