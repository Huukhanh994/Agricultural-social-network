<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    protected $table = 'poll_questions';
    protected $fillable = [
        'poll_question_id',
        'poll_question_type',
        'poll_question_content',
        'poll_question_instruction'
    ];
}
