<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropPlantAnimal extends Model
{
    protected $table = 'crop_plant_animals';
    protected $primaryKey = 'crop_plant_animal_id';
    protected $fillable = ['crop_plant_animal_id', 'crop_plant_animal_code', 'crop_plant_animal_name', 'crop_plant_animal_growth_time', 'crop_plant_animal_color', 'crop_plant_animal_weight','crop_plant_animal_height'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','product_id');
    }

    public function experience_farms()
    {
        return $this->hasMany(ExperienceFarm::class, 'crop_plant_animal_id', 'crop_plant_animal_id');
    }
}
