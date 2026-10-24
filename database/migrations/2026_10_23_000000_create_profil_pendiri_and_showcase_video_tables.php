<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Model ProfilPendiri dan ShowcaseVideo memakai tabel `profil_pendiri` dan `showcase_video`,
     * tetapi migrasi lama membuat tabel `anggota` dan `portofolio_video`. Tanpa migrasi ini,
     * database baru hasil `php artisan migrate` tidak bisa menjalankan situs.
     *
     * Di database yang sudah ada (misalnya di hosting), kedua tabel itu sudah ada, sehingga
     * migrasi ini tidak mengubah apa pun di sana.
     */
    public function up(): void
    {
        if (! Schema::hasTable('profil_pendiri')) {
            Schema::create('profil_pendiri', function (Blueprint $table) {
                $table->id('id_pendiri');
                $table->string('nama_pendiri');
                $table->text('deskripsi_pendiri');
                $table->string('foto_pendiri');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('showcase_video')) {
            Schema::create('showcase_video', function (Blueprint $table) {
                $table->id('id_video');
                $table->string('video_showcase');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Sengaja dikosongkan: tabel ini mungkin sudah ada sebelum migrasi ini dan berisi data.
    }
};
