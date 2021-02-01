<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    protected $table = 'poll_answers';
    protected $fillable = [
        'poll_answer_id',
        'poll_answer_content',
        'poll_question_id'
    ];
}
