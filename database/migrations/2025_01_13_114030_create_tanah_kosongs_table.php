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
        Schema::create('tanah_kosong', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanah_kosong')->nullable();
            $table->string('nama_entitas')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('keterangan_dasar_nilai')->nullable();
            $table->string('alamat')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('long', 11, 8)->nullable();
            $table->string('foto_tampak_depan')->nullable();
            $table->string('foto_tampak_sisi_kiri')->nullable();
            $table->string('foto_tampak_sisi_kanan')->nullable();
            $table->json('foto_lainnya')->nullable();
            $table->json('njop')->nullable();
            $table->string('nama_narsum')->nullable();
            $table->string('telepon')->nullable();
            $table->string('jenis_dok_hak_tanah')->nullable();
            $table->string('zona_lindung')->nullable();
            $table->string('zona_budidaya')->nullable();
            $table->string('jenis_data')->nullable();
            $table->dateTime('tgl_penawaran')->nullable();
            $table->string('sumber_data')->nullable();
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_tanah_terpotong')->nullable();
            $table->decimal('harga_penawaran', 20, 2)->nullable();
            $table->integer('diskon')->nullable();
            $table->decimal('harga_sewa_per_tahun', 20, 2)->nullable();
            $table->integer('skrap')->nullable();
            $table->integer('kemunduran_fungsi')->nullable();
            $table->text('penjelasan_kemunduran_fungsi')->nullable();
            $table->integer('kemunduran_ekonomis')->nullable();
            $table->text('penjelasan_kemunduran_ekonomis')->nullable();
            $table->integer('maintenance')->nullable();
            $table->string('pep_pembiayaan')->nullable();
            $table->string('pep_penjualan')->nullable();
            $table->string('pep_pengeluaran')->nullable();
            $table->string('pep_pasar')->nullable();
            $table->integer('kdb')->nullable();
            $table->integer('klb')->nullable();
            $table->integer('gsb')->nullable();
            $table->integer('ketinggian')->nullable();
            $table->integer('row_jalan')->nullable();
            $table->string('tipe_jalan')->nullable();
            $table->string('kapasitas_jalan')->nullable();
            $table->string('pengguna_lahan_lingkungan_eksisting')->nullable();
            $table->string('letak_posisi_obyek')->nullable();
            $table->string('letak_posisi_aset')->nullable();
            $table->string('bentuk_tanah')->nullable();
            $table->integer('lebar_muka_tanah')->nullable();
            $table->integer('ketinggian_tanah_dr_muka_jln')->nullable();
            $table->string('topografi')->nullable();
            $table->integer('tingkat_hunian')->nullable();
            $table->string('kondisi_lingkungan_khusus')->nullable();
            $table->text('kondisi_lingkungan_lainnya')->nullable();
            $table->text('keterangan_tambahan_lainnya')->nullable();
            $table->string('kualitas_pendapatan')->nullable();
            $table->string('biaya_operasional')->nullable();
            $table->string('ketentuan_sewa')->nullable();
            $table->string('manajemen')->nullable();
            $table->string('bauran_penyewa')->nullable();
            $table->string('ffe')->nullable();
            $table->string('mesin')->nullable();
            $table->text('nama_pusat_kota')->nullable();
            $table->text('nama_pusat_ekonomi')->nullable();
            $table->text('nama_jalan')->nullable();
            $table->text('kondisi_lingkungan')->nullable();
            $table->text('faktor_view')->nullable();
            $table->string('keterangan_jarak')->nullable();
            $table->string('pengguanan_tnh_saat_ini')->nullable();
            $table->string('pemberi_tugas')->nullable();
            $table->string('jenis_aset')->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('jabatan_narasumber')->nullable();
            $table->string('status_data_pembanding')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanah_kosongs');
    }
};
