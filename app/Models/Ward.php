<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $primaryKey = 'ward_id';
    protected $fillable = [
        'ward_id',
        'ward_code',
        'ward_type',
        'ward_name',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class,'district_id','district_code');
    }

    public function users()
    {
        return $this->hasMany(User::class,'ward_id','district_id');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
