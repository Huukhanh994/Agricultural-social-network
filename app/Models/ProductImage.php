<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable  = ['product_id', 'full'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
