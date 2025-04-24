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
        Schema::create('master_laporans', function (Blueprint $table) {
            $table->id();
            // Data Umum
            $table->unsignedInteger('laporan_id');
            $table->unsignedBigInteger('obyek_id');
            $table->unsignedBigInteger('bangunan_retail_uid');
            $table->unsignedBigInteger('tanah_kosong_uid');

            // Batas Batas
            $table->string('batas_timur')->nullable();
            $table->string('batas_tenggara')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_barat_daya')->nullable();
            $table->string('batas_barat')->nullable();
            $table->string('batas_barat_laut')->nullable();
            $table->string('batas_utara')->nullable();
            $table->string('batas_timur_laut')->nullable();

            // Bentuk Kepemilikan
            $table->string('bentuk_kepemilikan')->nullable();

            // Dokumen Hak Tanah
            $table->json('dokumen_hak_tanah_jenis')->nullable();
            $table->json('dokumen_hak_tanah_nomor')->nullable();
            $table->json('dokumen_hak_tanah_nama_pemegang_hak')->nullable();
            $table->json('dokumen_hak_tanah_tgl_diterbitkan')->nullable();
            $table->json('dokumen_hak_tanah_tgl_berakhir')->nullable();
            $table->json('dokumen_hak_tanah_nomor_su/sg')->nullable();
            $table->json('dokumen_hak_tanah_tgl_su/sg')->nullable();
            $table->json('dokumen_hak_tanah_luas_tanah')->nullable();
            $table->json('dokumen_hak_tanah_kantor_agraria')->nullable();
            $table->json('dokumen_hak_tanah_kondisi_khusus')->nullable();

            // Dokumen Hak Tanah Print
            $table->string('dokumen_hak_tanah_print')->nullable();

            // Keterangan Dokumen Tanah
            $table->text('keterangan_dokumen_tanah')->nullable();

            // Dokumen IMB
            $table->string('dokumen_imb_nomor')->nullable();
            $table->date('dokumen_imb_tgl_imb')->nullable();
            $table->string('dokumen_imb_diterbitkan_oleh')->nullable();
            $table->string('dokumen_imb_status')->nullable();
            $table->string('dokumen_imb_nama_pemegang_ijin')->nullable();
            $table->string('dokumen_imb_peruntukan_bangunan')->nullable();
            $table->string('dokumen_imb_lokasi_bangunan')->nullable();
            $table->string('dokumen_imb_no_sertifikat_tanah')->nullable();
            $table->json('dokumen_imb_nama_bangunan')->nullable();
            $table->json('dokumen_imb_luas')->nullable();
            $table->text('dokumen_imb_keterangan')->nullable();

            // Keterangan Dokumen IMB
            $table->text('keterangan_dokumen_imb')->nullable();

            // Peraturan Kawasan
            $table->string('peraturan_kawasan_peruntukan_kawasan')->nullable();
            $table->decimal('peraturan_kawasan_kdb')->nullable();
            $table->decimal('peraturan_kawasan_klb')->nullable();
            $table->decimal('peraturan_kawasan_gsb')->nullable();
            $table->integer('peraturan_kawasan_ketinggian')->nullable();
            $table->string('peraturan_kawasan_terkena_rencana_jalan')->nullable();
            $table->text('peraturan_kawasan_penjelasan')->nullable();

            // Analisis Data
            $table->string('analisis_data_hbu')->nullable();
            $table->string('analisis_data_pendekatan_penilaian')->nullable();

            // Asumsi Penilaian sesuai dengan Basis Nilai
            $table->string('asumsi_penilaian_syarat_pembiayaan')->nullable();
            $table->string('asumsi_penilaian_kondisi_penjualan')->nullable();
            $table->string('asumsi_penilaian_pengeluaran')->nullable();
            $table->string('asumsi_penilaian_kondisi_pasar')->nullable();

            // Properti
            $table->string('jenis_properti')->nullable();

            // Jenis Bangunan (khusus tanah kosong)
            $table->string('jenis_bangunan')->nullable();

            // Keterangan Peruntukan Tanah pada Tabel Analisis Ruko (khusus bangunan)
            $table->string('peruntukan_tanah_tabel_analisis')->nullable();

            // Keterangan Dasar Nilai pada Tabel Analisis
            $table->string('keterangan_dasar_nilai_tabel_analisis')->nullable();

            // Koordinat
            $table->string('lat')->nullable();
            $table->string('long')->nullable();

            // Foto (Selain Bangunan)
            $table->string('foto_tampak_depan')->nullable();
            $table->string('foto_tampak_sisi_kiri')->nullable();
            $table->string('foto_tampak_sisi_kanan')->nullable();
            $table->text('foto_lainnya')->nullable();

            // Nilai Perolehan / NJOP
            $table->json('njop_tahun')->nullable();
            $table->json('njop_nilai_perolehan')->nullable();

            //Properti (khusus retail)
            $table->string('jenis_properti_retail')->nullable();
            $table->string('kondisi_properti')->nullable();
            $table->string('spesifikasi_properti')->nullable();
            $table->string('tipe_apartemen')->nullable();
            $table->string('posisi_lantai')->nullable();
            $table->decimal('biaya_properti_service_charge')->nullable();
            $table->decimal('biaya_properti_parkir')->nullable();
            $table->decimal('biaya_properti_utilitas')->nullable();
            $table->decimal('biaya_properti_overtime')->nullable();
            $table->string('grade_bangunan')->nullable();
            $table->string('fasilitas_bangunan')->nullable();
            $table->decimal('row_koridor')->nullable();
            $table->string('tipe_akses_koridor')->nullable();
            $table->string('luas_gross_bangunan_total')->nullable();
            $table->integer('jumlah_lantai')->nullable();


            // Jalan
            $table->decimal('row_jalan')->nullable();
            $table->string('tipe_jalan')->nullable();
            $table->string('kapasitas_jalan')->nullable();

            // Lahan
            $table->string('penggunaan_lahan')->nullable();
            $table->string('posisi_obyek')->nullable();
            $table->string('lokasi_aset')->nullable();

            // Tanah
            $table->string('bentuk_tanah')->nullable();
            $table->decimal('lebar_muka_tanah')->nullable();
            $table->decimal('ketinggian_muka_jalan')->nullable();
            $table->string('topografi')->nullable();
            $table->decimal('tingkat_hunian')->nullable();

            // Kondisi Lingkungan Khusus
            $table->json('kondisi_lingkungan_khusus')->nullable();

            // Keterangan Tambahan Lainnya
            $table->string('keterangan_tambahan_lainnya')->nullable();

            // Karakteristik Ekonomi (Jika objek yang dinilai adalah Properti Komersial)
            $table->string('karakteristik_ekonomi_kualitas_pendapatan')->nullable();
            $table->string('karakteristik_ekonomi_biaya_operasional')->nullable();
            $table->string('karakteristik_ekonomi_ketentuan_sewa')->nullable();
            $table->string('karakteristik_ekonomi_manajemen')->nullable();
            $table->string('karakteristik_ekonomi_bauran_penyewa')->nullable();

            // Komponen Non-Realty dalam Penjualan
            $table->string('komponen_non_realty_ffe')->nullable();
            $table->string('komponen_non_realty_mesin')->nullable();

            // Gambaran Objek terhadap Wilayah dan Lingkungan
            $table->string('gambaran_objek_dari_pusat_kota')->nullable();
            $table->string('gambaran_objek_dari_pusat_ekonomi')->nullable();
            $table->string('gambaran_objek_dari_jalan_utama')->nullable();
            $table->string('gambaran_objek_kondisi_lingkungan_khusus')->nullable();
            $table->string('gambaran_objek_faktor_view')->nullable();

            // Obyek Penilaian (khusus bangunan)
            $table->json('obyek')->nullable();

            // Penggunaan tanah saat ini (khusus tanah kosong)
            $table->string('penggunaan_tanah_saat_ini')->nullable();

            // Penggunaan saat ini (khusus retail)
            $table->string('penggunaan_saat_ini')->nullable();
            $table->string('bentuk_bangunan')->nullable();
            $table->string('basement')->nullable();
            $table->string('konstruksi_bangunan')->nullable();
            $table->string('konstruksi_lantai')->nullable();
            $table->string('konstruksi_dinding')->nullable();
            $table->string('konstruksi_atap')->nullable();
            $table->string('konstruksi_pondasi')->nullable();
            $table->string('retail_tahun_dibangun')->nullable();
            $table->string('retail_tahun_renovasi')->nullable();
            $table->string('penggunaan_bangunan_saat_ini')->nullable();
            $table->json('perlengkapan_bangunan')->nullable();
            $table->string('penggunaan_bangunan')->nullable();

            // Sarana Pelengkap PAGAR - BUT MAPPI
            $table->json('pagar_sarana_pelengkap')->nullable();
            $table->json('pagar_bobot')->nullable();
            $table->json('pagar_adjusment_lain')->nullable();
            $table->decimal('pagar_umur_ekonomis')->nullable();
            $table->string('pagar_kondisi_sarana_secara_visual')->nullable();
            $table->integer('pagar_tahun_dibangun')->nullable();
            $table->json('pagar_sumber_informasi_tahun_dibangun')->nullable();
            $table->year('pagar_tahun_renovasi')->nullable();
            $table->json('pagar_sumber_informasi_tahun_renovasi')->nullable();
            $table->string('pagar_jenis_renovasi')->nullable();
            $table->decimal('pagar_bobot_renovasi')->nullable();
            $table->decimal('pagar_luas_bangunan')->nullable();

            // Sarana Pelengkap PERKERASAN - BUT MAPPI
            $table->json('perkerasan_sarana_pelengkap')->nullable();
            $table->json('perkerasan_bobot')->nullable();
            $table->json('perkerasan_adjusment_lain')->nullable();
            $table->decimal('perkerasan_umur_ekonomis')->nullable();
            $table->string('perkerasan_kondisi_sarana_secara_visual')->nullable();
            $table->integer('perkerasan_tahun_dibangun')->nullable();
            $table->json('perkerasan_sumber_informasi_tahun_dibangun')->nullable();
            $table->year('perkerasan_tahun_renovasi')->nullable();
            $table->json('perkerasan_sumber_informasi_tahun_renovasi')->nullable();
            $table->string('perkerasan_jenis_renovasi')->nullable();
            $table->decimal('perkerasan_bobot_renovasi')->nullable();
            $table->decimal('perkerasan_luas_bangunan')->nullable();

            // Sarana Pelengkap KANOPI - BUT MAPPI
            $table->json('kanopi_sarana_pelengkap')->nullable();
            $table->json('kanopi_bobot')->nullable();
            $table->json('kanopi_adjusment_lain')->nullable();
            $table->decimal('kanopi_umur_ekonomis')->nullable();
            $table->string('kanopi_kondisi_sarana_secara_visual')->nullable();
            $table->integer('kanopi_tahun_dibangun')->nullable();
            $table->json('kanopi_sumber_informasi_tahun_dibangun')->nullable();
            $table->year('kanopi_tahun_renovasi')->nullable();
            $table->json('kanopi_sumber_informasi_tahun_renovasi')->nullable();
            $table->string('kanopi_jenis_renovasi')->nullable();
            $table->decimal('kanopi_bobot_renovasi')->nullable();
            $table->decimal('kanopi_luas_bangunan')->nullable();

            // Foto
            $table->string('denah_tanah')->nullable();
            $table->string('denah_bangunan')->nullable(); //Khusus bangunan
            $table->string('gambar_peta_lokasi')->nullable();
            $table->string('sentuh_tanahku')->nullable();
            $table->string('gistaru')->nullable();

            // File
            $table->string('laporan_terinci')->nullable();
            $table->string('kertas_kerja')->nullable();

            // Pemberi Tugas
            $table->string('pemberi_tugas')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_laporans');
    }
};
