<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';
    protected $primaryKey = 'weather_id';
    protected $fillable = ['weather_id','weather_code','weather_name','weather_number','weather_notes','season_id'];

    public function seasonal()
    {
        return $this->belongsTo(Seasonal::class,'season_id','season_id');
    }
}
