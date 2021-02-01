<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'city_id';
    protected $fillable = ['city_id','city_code','city_name'];

    public function districts()
    {
        return $this->hasMany(District::class,'city_id');
    }
}
