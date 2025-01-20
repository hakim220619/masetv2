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
        Schema::table('tanah_kosong', function (Blueprint $table) {
            $table->string('bentuk_tanah_lainnya')->nullable()->after('bentuk_tanah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tanah_kosong', function (Blueprint $table) {
            $table->dropColumn('bentuk_tanah_lainnya');
        });
    }
};
