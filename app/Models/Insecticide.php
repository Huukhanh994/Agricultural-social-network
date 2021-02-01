<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Insecticide extends Model
{
    protected $table = 'insecticides';
    protected $primaryKey = 'insecticide_id';
    protected $fillable = ['insecticide_id','insecticide_code',
            'insecticide_name','insecticide_ingredient',
            'insecticide_dosage','insecticide_indication',
            'insecticide_age','insecticide_amount',
            'insecticide_producer','insecticide_produce_date',
            'insecticide_expiry_date','insecticide_price',
            'insecticide_notes','category_id'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function experience_farms()
    {
        return $this->hasMany(ExperienceFarm::class, 'insecticide_id', 'insecticide_id');
    }
}
