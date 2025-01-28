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
        Schema::create('bangunan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bangunan');
            $table->string('foto_depan')->nullable();
            $table->string('foto_sisi_kiri')->nullable();
            $table->string('foto_sisi_kanan')->nullable();
            $table->json('foto_lainnya')->nullable(); // JSON untuk foto lainnya
            $table->json('dynamic_data')->nullable(); // JSON untuk input dari @include
            $table->string('bentuk_bangunan')->nullable();
            $table->integer('jumlah_lantai')->default(1);
            $table->boolean('basement')->default(0);
            $table->string('konstruksi_bangunan')->nullable();
            $table->string('konstruksi_lantai')->nullable();
            $table->string('konstruksi_dinding')->nullable();
            $table->string('konstruksi_atap')->nullable();
            $table->string('konstruksi_pondasi')->nullable();
            $table->string('versi_btb')->nullable();
            $table->string('tipe_spek')->nullable();
            $table->string('penggunaan_bangunan')->nullable();
            $table->json('perlengkapan_bangunan')->nullable();
            $table->integer('progres_pembangunan')->nullable();
            $table->string('kondisi_bangunan')->nullable();
            $table->string('status_data')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obyek_bangunan');
    }
};
