<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'order_number',
        'order_status',
        'order_grand_total',
        'order_item_count',
        'order_name',
        'order_email',
        'order_address',
        'order_city',
        'order_tel',
        'order_notes',
        'payment_status',
        'payment_method',
        'order_shipping'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

}
