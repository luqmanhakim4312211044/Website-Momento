<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowcaseVideo extends Model
{
    protected $table = 'showcase_video';
    protected $primaryKey = 'id_video';

    protected $fillable = [
        'video_showcase',
    ];
}
