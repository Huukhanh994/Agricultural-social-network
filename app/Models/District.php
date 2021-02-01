<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'district_id';
    protected $fillable = ['district_id','district_code','district_name', 'district_address', 'district_latitude', 'district_longitude',"city_id"];

    public function city()
    {
        return $this->belongsTo(City::class,'city_id',"city_code");
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id',"district_id");
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
