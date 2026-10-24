<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakPerusahaan extends Model
{
    protected $table = 'kontak_perusahaan';
    protected $primaryKey = 'id_kontak';
    
    protected $fillable = [
        'jenis_kontak', 
        'isi_kontak', 
        'logo_kontak'
    ];
}
