<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembanding_retail', function (Blueprint $table) {
            $table->id();
            $table->string('nama_retail')->nullable();
            $table->string('nama_entitas')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('alamat')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->string('kondisi_properti')->nullable();
            $table->string('estimasi_properti')->nullable();
            $table->string('spesifikasi_properti')->nullable();
            $table->string('tipe_apartemen')->nullable();
            $table->integer('posisi_lantai')->nullable();
            $table->integer('jumlah_lantai')->nullable();
            $table->decimal('row_koridor', 8, 2)->nullable();
            $table->decimal('luas_bangunan_total', 8, 2)->nullable();
            $table->string('fasilitas_bangunan')->nullable();
            $table->string('grade_bangunan')->nullable();
            $table->string('tipe_akses_koridor')->nullable();
            $table->json('nilai_perolehan_njop')->nullable(); // Data NJOP
            $table->json('foto_lainnya')->nullable();         // Foto Lainnya
            $table->string('foto_tampak_depan')->nullable();
            $table->string('foto_tampak_sisi_kiri')->nullable();
            $table->string('foto_tampak_sisi_kanan')->nullable();
            $table->json('narasumber')->nullable();           // Narasumber
            $table->string('jenis_dok_hak_tanah')->nullable();
            $table->date('tgl_berakhir_dokumen')->nullable();
            $table->string('peruntukan_bangunan')->nullable();
            $table->string('jenis_data')->nullable();
            $table->date('tgl_penawaran')->nullable();
            $table->string('sumber_data')->nullable();
            $table->decimal('luas_semigross', 8, 2)->nullable();
            $table->decimal('luas_net', 8, 2)->nullable();
            $table->decimal('harga_penawaran', 20, 2)->nullable();
            $table->decimal('diskon', 5, 2)->nullable();
            $table->decimal('harga_sewa_pertahun', 20, 2)->nullable();
            $table->decimal('skrap', 5, 2)->nullable();
            $table->json('penyusutan')->nullable();           // Penyusutan
            $table->json('penyesuaian_elemen_perbandingan')->nullable();
            $table->json('penggunaan')->nullable();           // Penggunaan
            $table->decimal('row_jalan', 8, 2)->nullable();
            $table->string('tipe_jalan')->nullable();
            $table->string('kapasitas_jalan')->nullable();
            $table->string('pengguna_lahan_lingkungan_eksisting')->nullable();
            $table->string('letak_posisi_obyek')->nullable();
            $table->string('letak_posisi_aset')->nullable();
            $table->string('bentuk_tanah')->nullable();
            $table->string('bentuk_tanah_lainnya')->nullable();
            $table->decimal('lebar_muka_tanah', 8, 2)->nullable();
            $table->decimal('ketinggian_tanah_dr_muka_jln', 8, 2)->nullable();
            $table->string('topografi')->nullable();
            $table->decimal('tingkat_hunian', 5, 2)->nullable();
            $table->json('kondisi_lingkungan_khusus')->nullable();
            $table->string('kondisi_lingkungan_lainnya')->nullable();
            $table->string('keterangan_tambahan_lainnya')->nullable();
            $table->json('karakteristik_ekonomi')->nullable();
            $table->json('komponen_non_reality')->nullable();
            $table->json('gambaran_objek')->nullable();
            $table->string('keterangan_jarak')->nullable();
            $table->string('pemberi_tugas')->nullable();
            $table->string('status_data_pembanding')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembanding_retail');
    }
};
