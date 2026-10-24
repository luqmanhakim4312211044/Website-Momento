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
        Schema::create('kontak_perusahaan', function (Blueprint $table) {
            $table->id('id_kontak');
            $table->string('jenis_kontak');
            $table->string('isi_kontak');
            $table->string('logo_kontak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_perusahaan');
    }
};
