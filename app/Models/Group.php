<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $primaryKey = 'group_id';

    protected $fillable = ['group_id','group_code','group_name','group_description','group_is_private','group_members','category_id','group_avatar'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class,'group_post','group_id','post_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_users','group_id','id');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
