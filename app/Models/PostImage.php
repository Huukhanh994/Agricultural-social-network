<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_images';
    protected $primaryKey = 'post_image_id';
    protected $fillable = [
        'post_image_id',
        'post_id',
        'post_image_path'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
