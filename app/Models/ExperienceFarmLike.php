<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceFarmLike extends Model
{
    protected $table = 'experience_farm_likes';
    protected $primaryKey = 'experience_farm_like_id';
    protected $fillable = ['experience_farm_like_id','like','dislike','experience_farm_id','user_id'];

    public function experience_farm()
    {
        return $this->belongsTo(ExperienceFarm::class, 'experience_farm_id', 'experience_farm_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
