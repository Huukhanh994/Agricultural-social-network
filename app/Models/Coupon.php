<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table ='coupons';
    protected $primaryKey = 'coupon_id';
    protected $fillable = ['coupon_code','coupon_discount'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_coupons', 'coupon_id', 'product_id');
    }
}
