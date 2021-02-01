<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    protected $table = 'group_posts';

    protected $fillable = ['group_id','post_id'];

}
