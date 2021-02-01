<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    protected $primaryKey = 'food_id';
    protected $fillable = ['food_id','food_code','food_name','food_description','food_price','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public function experience_farms()
    {
        return $this->hasMany(ExperienceFarm::class, 'food_id', 'food_id');
    }
}
