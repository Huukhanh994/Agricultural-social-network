<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';
    protected $fillable = [
        'order_item_id',
        // 'order_item_qty_food',
        // 'order_item_qty_insecticide',
        'order_item_quantity',
        'order_item_price',
        'product_id',
        'order_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
