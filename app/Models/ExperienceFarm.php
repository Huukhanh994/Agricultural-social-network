<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceFarm extends Model
{
    protected $table = 'experience_farms';
    protected $primaryKey = 'experience_farm_id';
    protected $fillable = [
        'category_id','seasonal_id',
        'experience_farm_name',
        'experience_farm_time_farm',
        'experience_farm_water','experience_farm_soil_properties',
        'experience_farm_start_to_do', 'experience_farm_end_to_do',
        'experience_farm_notes','product_id',
        'user_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id', 'category_id');
    }

    public function season()
    {
        return $this->belongsTo(Seasonal::class, 'season_id', 'season_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function experience_farm_likes()
    {
        return $this->hasMany(ExperienceFarmLike::class,'experience_farm_id','experience_farm_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
