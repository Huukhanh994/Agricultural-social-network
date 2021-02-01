<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inani\Larapoll\Helpers\PollHandler;
use Inani\Larapoll\Http\Request\PollCreationRequest;
use Inani\Larapoll\Poll;
class PollManagerController extends Controller
{
    public function home()
    {
        $polls = Poll::all();
        return view('admin.survey.home.index',compact('polls'));
    }
    public function index()
    {
        $polls = Poll::withCount('options', 'votes')->latest()->paginate(config('larapoll_config.pagination'));
        return view('admin.survey.polls.index',compact('polls'));
    }

    public function create()
    {
        return view('admin.survey.polls.create');
    }

    public function store(Request $request)
    {
        try {
            PollHandler::createFromRequest($request->all());
        } catch (DuplicatedOptionsException $exception) {
            return redirect(route('admin.polls.create'))
            ->withInput($request->all())
                ->with('danger', $exception->getMessage());
        }

        return redirect(route('admin.polls.index'))
        ->with('success', 'Your poll has been addedd successfully');
    }

    public function edit(Poll $poll)
    {
        return view('admin.survey.polls.edit',compact('poll'));
    }

    public function update(Poll $poll, PollCreationRequest $request)
    {
        PollHandler::modify($poll, $request->all());
        return redirect(route('admin.polls.index'))
            ->with('success', 'Your poll has been updated successfully');
    }

    public function lock(Poll $poll)
    {
        $poll->lock();
        return redirect(route('admin.polls.index'))
        ->with('success', 'Your poll has been locked successfully');
    }

    public function unlock(Poll $poll)
    {
        $poll->unLock();
        return redirect(route('admin.polls.index'))
        ->with('success', 'Your poll has been unlocked successfully');
    }

    public function remove(Poll $poll)
    {
        $poll->delete();
        return redirect(route('admin.polls.index'))->with('success', 'Delete your poll success');
    }
}
