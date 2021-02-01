<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $table = 'user_votes';
    protected $fillable = [
        'user_vote',
        'user_id',
        'poll_answer_id',
        'poll_id'
    ];
}
