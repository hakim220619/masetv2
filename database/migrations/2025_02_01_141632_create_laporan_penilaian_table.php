<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_penilaian', function (Blueprint $table) {
            $table->id();

            // Data Umum
            $table->string('judul_laporan');
            $table->string('nama_entitas')->nullable();
            $table->text('judul_print_cover')->nullable();
            $table->integer('versi_btb')->nullable();

            // Laporan Penilaian
            $table->string('no_laporan_penilaian')->nullable();
            $table->date('tgl_laporan_penilaian')->nullable();

            // Dokumen Kontrak
            $table->string('no_doumen_kontrak')->nullable();
            $table->date('tgl_dokumen_kontrak')->nullable();

            // Pemberi Tugas
            $table->string('nama_instansi_pemberi_tugas')->nullable();
            $table->string('key_kcp_pemberi_tugas')->nullable();
            $table->string('cp_penugasan_pemberi_tugas')->nullable();
            $table->string('telepon_pemberi_tugas')->nullable();

            // Tujuan Penilaian
            $table->string('tujuan_penilaian')->nullable();
            $table->string('tujuan_spesifik')->nullable();

            // Debitur
            $table->string('nama_debitur')->nullable();
            $table->string('nama_yang_dihubungi_debitur')->nullable();
            $table->string('no_telepon_debitur')->nullable();

            // Pengguna Laporan
            $table->string('nama_instansi_pengguna_laporan')->nullable();
            $table->string('pilih_nama_instansi_pengguna_laporan')->nullable();
            $table->text('alamat')->nullable();

            // Pengguna Laporan Khusus
            $table->string('pengguna_laporan_khusus')->nullable();

            // Kategori Kredit
            $table->string('kategori_kredit')->default('Konsumer (KPR)');
            $table->string('kategori_kredit_bca')->nullable();

            // Tipe Jaminan & Lokasi Cabang Bank
            $table->string('tipe_jaminan')->default('Rumah Tinggal');
            $table->string('lokasi_cabang_bank')->default('BCA KCU Madiun');

            // BAP / Final
            $table->string('kota_bap_final')->nullable();
            $table->string('pilih_nama_instansi_daerah_bap_final')->nullable();

            // Dasar Nilai Spesifik
            $table->string('dasar_nilai_spesifik')->nullable();

            // Dasar Penilaian (checkboxes: Nilai Penggantian Wajar, Nilai Pasar, Nilai Khusus)
            $table->json('dasar_penilaian')->nullable();

            // Pendekatan Penilaian (disimpan dalam bentuk JSON)
            $table->json('pendekatan_penilaian')->nullable();

            // Lokasi Obyek
            $table->string('provinsi_obyek')->nullable();
            $table->string('kabupaten_lokasi_obyek')->nullable();
            $table->string('kecamatan_lokasi_obyek')->nullable();
            $table->string('kelurahan_lokasi_obyek')->nullable();
            $table->string('rt_rw_lokasi_obyek')->nullable();
            $table->string('kode_pos_rt_rw_lokasi_obyek')->nullable();
            $table->string('wil_admint2_lokasi_obyek')->nullable();
            $table->string('wil_admint4_lokasi_obyek')->nullable();
            $table->text('alamat_lokasi_obyek')->nullable();

            // Tanggal Inspeksi & Penilaian
            $table->date('tanggal_inspeksi')->nullable();
            $table->date('tanggal_penilaian')->nullable();

            // Suku Bunga Pinjaman
            $table->string('tingkat_suku_bunga_suku_bunga_pinjaman')->nullable();
            $table->string('sumberdata_suku_bunga_pinjaman')->nullable();
            $table->string('screenshoot_sumber_suku_bunga_pinjaman')->nullable();

            // Tim Penilai
            $table->string('admin_tim_penilai')->nullable();
            $table->string('tim_penilai_qc')->nullable();
            $table->string('penilai1_tim_penilai')->nullable();
            $table->string('penilai2_tim_penilai')->nullable();
            $table->string('reviewer_tim_penilai')->nullable();
            $table->string('pj_tim_penilai')->nullable();

            // Pendamping Inspeksi
            $table->string('nama_pendamping_inpeksi')->nullable();
            $table->string('telepon_pendamping_inpeksi')->nullable();
            $table->string('status_pendamping_inpeksi')->nullable();

            // Kelengkapan Dokumen (disimpan dalam bentuk JSON)
            $table->json('kelengkapan_dokumen')->nullable();

            // Izin Layak Huni
            $table->date('tgl_izin_layak_huni')->nullable();
            $table->string('no_izin_layak_huni')->nullable();

            // Akta Pemisahan
            $table->date('tgl_akta_pemisahan')->nullable();
            $table->string('no_akta_pemisahan')->nullable();
            $table->string('dibuat_akta_pemisahan')->nullable();
            $table->string('disahkan_oleh_akta_pemisahan')->nullable();
            $table->date('tgl_disahkan_akta_pemisahan')->nullable();
            $table->string('no_pengesahan_akta_pemisahan')->nullable();

            // Informasi Khusus
            $table->text('informasi_khusus')->nullable();

            // Status Input Data dari Admin
            $table->string('status_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penilaian');
    }
};
