<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationships';
    protected $primaryKey = 'relationship_id';
    protected $fillable = ['relationship_id','sender_id', 'receiver_id', 'status', 'action_user_id'];
    
    public function sender_user()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
    public function receiver_user()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
    // # whereHas and with of Model
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
