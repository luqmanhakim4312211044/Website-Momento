<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPendiri extends Model
{
    protected $table = 'profil_pendiri';
    protected $primaryKey = 'id_pendiri';

    protected $fillable = [
        'nama_pendiri',
        'deskripsi_pendiri',
        'foto_pendiri'
    ];
}
