<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    protected $table = 'media_sosial';
    protected $primaryKey = 'id_media';

    protected $fillable = [
        'nama_media',
        'url_media',
        'logo_platform'
    ];
}
