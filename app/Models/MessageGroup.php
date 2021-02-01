<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageGroup extends Model
{
    protected $table = 'message_groups';
    protected $primaryKey = 'message_group_id';
    protected $fillable = ['message_group_id','type','from_id','to_id','body','attachment','seen'];

    public function from_user()
    {
        return $this->belongsTo(User::class,'from_id','id');
    }

    public function to_group()
    {
        return $this->belongsTo(Group::class,'to_id','group_id');
    }
    
}
