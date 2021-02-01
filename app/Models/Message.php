<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['id','type','from_id','to_id','body','attachment','seen'];

    public function sender_user()
    {
        return $this->belongsTo(User::class,'from_id','id');
    }

    public function receiver_user()
    {
        return $this->belongsTo(User::class,'to_id','id');
    }
}
