<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageGroup;
use App\Models\Relationship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Post;
class GroupController extends BaseController
{
    public function index()
    {
        $this->setPageTitle("Index group","Index group");
        $groups = Group::withCount('users')->get();
        // $groups = Group::with(['users'])->withCount('users')
        // ->whereHas('users', function($q) {
        //     $q->whereNotIn("group_users.id",[Auth::user()->id]);
        // })
        // ->get();
        // dd($groups);
        // $selectGroupIsAuthDoNotSendRequestJoin = DB::table('groups')->join('group_users','group_users.group_id','=','groups.group_id')
        // ->join('users','group_users.id','=','users.id')
        // ->select('groups.*','group_users.*')
        //     ->whereNotIn('group_users.id', [Auth::user()->id])
        // ->get();
        // dd($selectGroupIsAuthDoNotSendRequestJoin);
        $categories = Category::all();
        $messages = Message::with(['sender_user', 'receiver_user'])->where('from_id', '=', Auth::user()->id)->orWhere('to_id', '=', Auth::user()->id)->get();

        $count_friend = Relationship::with(['sender_user', 'receiver_user'])->select(DB::raw('count(*) as count_friend'))
        ->where('status', '=', '1')
        ->where('sender_id', '=', Auth::user()->id)
        ->orWhere('receiver_id', '=', Auth::user()->id)
        ->groupBy('status')
        ->get();
        return view('site.groups.index',compact('groups','messages','count_friend','categories'));
    }

    public function ajaxSendRequestGroup(Request $request)
    {
        $input = $request->all();
        $group_user = new GroupUser();
        $group_user->id = Auth::user()->id;
        $group_user->group_id = $input['group_id'];
        $group_user->group_status = '0';
        $group_user->save();
        return Response::json(['success' => "Send request join the group successfully!"]);
    }
    
    public function create()
    {
        $messages = Message::with(['sender_user', 'receiver_user'])->where('from_id', '=', Auth::user()->id)->orWhere('to_id', '=', Auth::user()->id)->get();

        $count_friend = Relationship::with(['sender_user', 'receiver_user'])->select(DB::raw('count(*) as count_friend'))
        ->where('status', '=', '1')
        ->where('sender_id', '=', Auth::user()->id)
        ->orWhere('receiver_id', '=', Auth::user()->id)
        ->groupBy('status')
        ->get();
        
        $categories = Category::all();

        return view('site.groups.create',compact('categories', 'messages', 'count_friend'));
    }

    public function store(Request $request)
    {
        $group = new Group();
        $group->group_code = $request->get('group_code');
        $group->group_name = $request->get('group_name');
        $group->group_description = $request->get('group_description');
        $group->group_is_private = $request->get('private');
        $group->category_id = $request->get('category_id');
        if ($request->hasFile('group_avatar')) {
            $image = $request->file('group_avatar');
            // $image->storeAs('public/groups/', $image->getClientOriginalName());
            $image->move(public_path() . '/storage/group_avatar/', $image->getClientOriginalName());
        }
        $group->group_avatar = $image->getClientOriginalName();
        $group->save();
        if (!$group) {
            return redirect()->back()->with('error', 'Cannot create group!');
        }
        return redirect()->route('site.groups.index')->with('success', 'Group added successfully');
    }

    public function show($id)
    {
        $this->setPageTitle("Show group","Show group");
        $group = Group::with(['category','posts','users'])
        ->find($id);
        return view('site.groups.show',compact('group'));
    }

    public function chat()
    {
        return view('site.groups.chat');
    }
}
