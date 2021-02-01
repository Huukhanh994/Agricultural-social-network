<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Str;
class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_id', 'category_name', 'category_slug'];

    public function setNameAttribute($value)
    {
        $this->attributes['category_name']   = $value;
        $this->attributes['category_slug']   = str_slug($value);
    }

    public function foods()
    {
        return $this->hasMany(Food::class,'category_id','category_id');
    }

    public function insecticides()
    {
        return $this->hasMany(Insecticide::class,'category_id','category_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id','category_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories','category_id','product_id');
    }

    public function experience_farms()
    {
        return $this->hasOne(ExperienceFarm::class,'category_id','category_id');
    }
}
