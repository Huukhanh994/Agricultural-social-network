<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Seasonal extends Model
{
    protected $table = 'seasonals';
    protected $primaryKey = 'season_id';
    protected $fillable = [
        'season_id',
        'season_code',
        'season_name',
        'season_note',
        'season_start_date',
        'season_end_date',
        'year_id'
    ];

    public function year()
    {
        return $this->belongsTo('App\Models\Year', 'year_id', 'year_id');
    }

    public function days()
    {
        return $this->hasMany(Day::class,'season_id', 'season_id');
    }

    public function weathers()
    {
        return $this->hasMany(Weather::class,'season_id','season_id');
    }

    public function experience_farms()
    {
        return $this->hasOne(ExperienceFarm::class, 'season_id', 'season_id');
    }
}
