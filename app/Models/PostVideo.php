<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostVideo extends Model
{
    protected $table = 'post_videos';
    protected $fillable = [
        'post_video_id',
        'post_id',
        'post_video_path'
    ];
}
