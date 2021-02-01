<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inani\Larapoll\Http\Request\AddOptionsRequest;
use Inani\Larapoll\Poll;
class OptionManagerController extends Controller
{
    public function push(Poll $poll)
    {
        return view('admin.survey.options.push',compact('poll'));
    }

    public function add(Poll $poll, AddOptionsRequest $request)
    {
        $poll->attach($request->get('options'));

        return redirect(route('admin.polls.index'))->with('success', 'New poll options has added');
    }

    public function remove(Poll $poll, Request $request)
    {
        try {
            $poll->detach($request->get('options'));
            return redirect(route('admin.polls.index'))
            ->with('success', 'Poll options have been removed successfully');
        } catch (Exception $e) {
            return back()->withErrors(PollHandler::getMessage($e));
        }
    }

    public function delete(Poll $poll)
    {
        return view('admin.survey.options.remove', compact('poll'));
    }
}
