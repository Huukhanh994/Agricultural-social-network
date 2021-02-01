<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inani\Larapoll\Poll;
use Inani\Larapoll\Helpers\PollWriter;
class VoteManagerController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('admin.survey.votes.index',compact('polls'));
    }
}
