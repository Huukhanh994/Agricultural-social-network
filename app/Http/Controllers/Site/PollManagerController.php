<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inani\Larapoll\Helpers\PollHandler;
use Inani\Larapoll\Poll;
class PollManagerController extends BaseController
{
    public function __construct()
    {
        $this->middleware('permission:poll-list|poll-create|poll-edit|poll-delete',['only' => ['index','store']]);
        $this->middleware('permission:poll-create',['only' => ['create','store']]);
        $this->middleware('permission:poll-edit',['only' => ['edit','update']]);
        $this->middleware('permission:poll-delete',['only' => ['destroy']]);
    }
    public function index()
    {
        return;
    }

    public function create()
    {
        return view('site.survey.poll.create');
    }

    public function store(Request $request)
    {
        try {
            PollHandler::createFromRequest($request->all());
        } catch (DuplicatedOptionsException $exception) {
            return redirect(route('site.pages.home'))
            ->withInput($request->all())
                ->with('danger', $exception->getMessage());
        }
        return redirect()->route('site.pages.home')->with('success', 'Add poll added successfully');
    }
}
