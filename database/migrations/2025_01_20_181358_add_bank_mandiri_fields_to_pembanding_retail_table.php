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
        Schema::table('pembanding_retail', function (Blueprint $table) {
            $table->string('jenis_aset')->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('jenis_aset_campuran')->nullable();
            $table->string('topografi_isian')->nullable();
            $table->string('jabatan_narasumber')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pembanding_retail', function (Blueprint $table) {
            $table->dropColumn(['jenis_aset', 'peruntukan', 'jenis_aset_campuran', 'topografi_isian', 'jabatan_narasumber']);
        });
    }
};
