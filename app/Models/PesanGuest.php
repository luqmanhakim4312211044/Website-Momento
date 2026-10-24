<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanGuest extends Model
{
    protected $table = 'pesan_guest';
    protected $primaryKey = 'id_pesan';
    
    protected $fillable = [
        'nama_pengirim',
        'email_pengirim',
        'isi_pesan',
    ];
}
