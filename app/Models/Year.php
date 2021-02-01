<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $fillable = [
        'year_id',
        'year_name'
    ];

    public function seasonals()
    {
        return $this->hasMany('App\Models\Seasonal', 'year_id','year_id');
    }
}
