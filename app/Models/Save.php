<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $table = 'saves';
    protected $primaryKey = 'save_id';
    protected $fillable = ['save_id','save_type','post_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id','post_id');
    }
}
