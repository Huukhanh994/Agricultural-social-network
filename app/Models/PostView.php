<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    protected $table = 'post_views';
    protected $fillable = [
        'post_view_id',
        'post_view_view',
        'post_id'
    ];
}
