<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Overtrue\LaravelLike\Traits\Likeable;
use willvincent\Rateable\Rateable;
class Post extends Model
{
    use Likeable, Rateable;
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_id',
        'post_slug',
        'post_title',
        'post_content',
        'post_price',
        'post_status',
        'post_published',
        'user_id',
        'category_id',
        'post_lat',
        'post_lng',
        'post_requestIp',
        'status_user'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['post_content'] = $value;
        $this->attributes['post_slug'] = Str::slug($value);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class,'post_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class,'group_post','post_id','group_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','post_id');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
        ->with([$relation => $constraint]);
    }

    public function postLikes()
    {
        return $this->hasMany(PostLike::class,'post_id','post_id');
    }
}
