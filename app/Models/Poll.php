<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';
    protected $fillable = ['question', 'canVisitorsVote', 'canVoterSeeResult'];
    protected $guarded  = [];
}
