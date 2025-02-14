<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembanding_bangunan', function (Blueprint $table) {
            $table->id();
            // Data Umum
            $table->string('nama_bangunan')->nullable();
            $table->string('nama_kjpp')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('jenis_properti')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->text('alamat')->nullable();

            // Foto
            $table->string('foto_tampak_depan')->nullable();
            $table->string('foto_tampak_sisi_kiri')->nullable();
            $table->string('foto_tampak_sisi_kanan')->nullable();
            $table->text('foto_lainnya')->nullable(); // JSON

            // NJOP
            $table->string('tahun_njop')->nullable();
            $table->string('nilai_njop')->nullable();

            // Narasumber
            $table->string('nama_narsum')->nullable();
            $table->string('telepon')->nullable();

            // Dokumen
            $table->string('jenis_dok_hak_tanah')->nullable();
            $table->string('zona_lindung')->nullable();
            $table->string('zona_budidaya')->nullable();

            // Data Transaksi
            $table->string('jenis_data')->nullable();
            $table->datetime('tgl_penawaran')->nullable();
            $table->string('sumber_data')->nullable();
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_tanah_terpotong')->nullable();
            $table->integer('luas_bangunan_terpotong')->nullable();
            $table->decimal('harga_penawaran', 20, 2)->nullable();
            $table->decimal('diskon', 5, 2)->nullable();
            $table->decimal('harga_sewa_per_tahun', 20, 2)->nullable();
            $table->string('skrap')->nullable();

            // Penyusutan
            $table->string('kemunduran_fungsi')->nullable();
            $table->text('penjelasan_kemunduran_fungsi')->nullable();
            $table->string('kemunduran_ekonomis')->nullable();
            $table->text('penjelasan_kemunduran_ekonomis')->nullable();
            $table->string('maintenance')->nullable();

            // Penyesuaian
            $table->string('pep_pembiayaan')->nullable();
            $table->string('pep_penjualan')->nullable();
            $table->string('pep_pengeluaran')->nullable();
            $table->string('pep_pasar')->nullable();

            // Data Bangunan
            $table->string('bentuk_bangunan')->nullable();
            $table->integer('jumlah_lantai')->nullable();
            $table->boolean('basement')->default(false);
            $table->string('kontruksi_bangunan')->nullable();
            $table->string('kontruksi_lantai')->nullable();
            $table->string('kontruksi_dinding')->nullable();
            $table->string('kontruksi_atap')->nullable();
            $table->string('kontruksi_pondasi')->nullable();
            $table->string('versi_btb')->nullable();
            $table->string('tipe_spek')->nullable();
            $table->string('grade_gudang')->nullable();
            $table->string('jenis_bangunan')->nullable();
            $table->string('jenis_bangunan_detail')->nullable();
            $table->string('jenis_bangunan_indeks_lantai')->nullable();
            $table->integer('tahun_dibangun')->nullable();
            $table->string('keterangan_tahun_dibangun')->nullable();
            $table->integer('tahun_renovasi')->nullable();
            $table->string('keterangan_tahun_direnovasi')->nullable();
            $table->string('jenis_renovasi')->nullable();
            $table->decimal('bobot_renovasi', 5, 2)->nullable();
            $table->string('kondisi_visual')->nullable();
            $table->text('catatan_khusus')->nullable();

            // Luas dan Bobot
            $table->text('luas_nama_pintu_jendela')->nullable(); // JSON
            $table->text('luas_bobot_pintu_jendela')->nullable(); // JSON
            $table->text('luas_nama_dinding')->nullable(); // JSON
            $table->text('luas_bobot_dinding')->nullable(); // JSON
            $table->text('luas_nama_rangka_atap_datar')->nullable(); // JSON
            $table->text('luas_bobot_rangka_atap_datar')->nullable(); // JSON
            $table->text('luas_nama_atap_datar')->nullable(); // JSON
            $table->text('luas_bobot_atap_datar')->nullable(); // JSON

            // Tipe dan Bobot
            $table->text('tipe_pondasi_existing')->nullable(); // JSON
            $table->text('bobot_tipe_pondasi_existing')->nullable(); // JSON
            $table->text('tipe_struktur_existing')->nullable(); // JSON
            $table->text('bobot_tipe_struktur_existing')->nullable(); // JSON
            $table->text('tipe_rangka_atap_existing')->nullable(); // JSON
            $table->text('bobot_rangka_atap_existing')->nullable(); // JSON
            $table->text('tipe_penutup_atap_existing')->nullable(); // JSON
            $table->text('bobot_penutup_atap_existing')->nullable(); // JSON
            $table->text('tipe_tipe_dinding_existing')->nullable(); // JSON
            $table->text('bobot_tipe_dinding_existing')->nullable(); // JSON
            $table->text('tipe_tipe_pelapis_dinding_existing')->nullable(); // JSON
            $table->text('bobot_tipe_pelapis_dinding_existing')->nullable(); // JSON
            $table->text('tipe_tipe_pintu_jendela_existing')->nullable(); // JSON
            $table->text('bobot_tipe_pintu_jendela_existing')->nullable(); // JSON
            $table->text('tipe_tipe_lantai_existing')->nullable(); // JSON
            $table->text('bobot_tipe_lantai_existing')->nullable(); // JSON

            // Data Tambahan
            $table->integer('jumlah_lantai_rumah_tinggal')->nullable();
            $table->string('penggunaan_bangunan')->nullable();
            $table->text('perlengkapan_bangunan')->nullable(); // JSON
            $table->decimal('progres_pembangunan', 5, 2)->nullable();
            $table->string('kondisi_bangunan')->nullable();

            // Data Pemberi Tugas
            $table->string('pemberi_tugas')->nullable();
            $table->string('jenis_aset')->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('jenis_aset_lainnya')->nullable();
            $table->string('jabatan_narasumber')->nullable();

            $table->string('status_data_pembanding')->default('draft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembanding_bangunan');
    }
};
