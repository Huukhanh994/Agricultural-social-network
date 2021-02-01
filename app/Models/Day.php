<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';
    protected $fillable = ['day_id','day_name','season_id'];

    public function seasonal()
    {
        return $this->belongsTo(Seasonal::class,'season_id','season_id');
    }
}
