<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FriendController extends BaseController
{
    public function index()
    {
        // $friends = DB::table('relationships')->where('status','=','1')->rightJoin('users', function($join){
        //     $join->on('relationships.sender_id','=','users.id');
        //     $join->orOn('relationships.receiver_id','=','users.id');
        // })
        // ->where('sender_id','=',Auth::user()->id)
        // ->orWhere('receiver_id','=',Auth::user()->id)
        // ->get();
        // $friends = User::join('relationships', function($join){
        //     $join->on('users.id','=','relationships.sender_id')
        //     ->where('relationships.sender_id','=',Auth::user()->id);
        //     $join->orOn('users.id','=','relationships.receiver_id')
        //     ->where('relationships.receiver_id','=',Auth::user()->id);
        //     $join->where('relationships.status','=','1');
        // })->get();
        $friends = User::join('relationships', function ($join) {
            $join->on('users.id', '=', 'relationships.sender_id')
            // ->where('relationships.sender_id', '=', Auth::user()->id)
            ->where('relationships.receiver_id', '=', Auth::user()->id);
            $join->orOn('users.id', '=', 'relationships.receiver_id')
            // ->where('relationships.receiver_id', '=', Auth::user()->id)
            ->where('relationships.sender_id', '=', Auth::user()->id);
        })
        ->where('relationships.status','=','1')->get();
        // dd($friends);
        $count_friend = Relationship::with(['sender_user', 'receiver_user'])->select(DB::raw('count(*) as count_friend'))
        ->where('status','=','1')
        ->where('sender_id', '=', Auth::user()->id)
        ->orWhere('receiver_id', '=', Auth::user()->id)
        ->groupBy('status')
        ->get();
        
        $this->setPageTitle("Index friend",'Index friend');

        $users = User::all();
        
        return view('site.friends.index',compact('friends','count_friend','users'));
    }

    public function getuserView($id)
    {
        $user = User::find($id);
        return view('site.friends.usersView', compact('user'));
    }

    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {
        if($request->ajax()){
            $user = User::where('name', $request->userName)->first();
            $me = User::where('name', Auth::user()->name)->first();

            $me->follow($user);

            $count = $user->followers()->count(); // 1
            return response()->json(['count' => $count]);
        }
    }

    public function unFollow(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('name', $request->userName)->first();
            $me = User::where('name', Auth::user()->name)->first();

            $me->unFollow($user);

            $count = $user->followers()->count(); // 1
            return response()->json(['count' => $count]);
        }
    }

    public function show($id)
    {
        $user = User::with('wards')->find($id);
        $friends = User::join('relationships', function ($join) use ($id) {
            $join->on('users.id', '=', 'relationships.sender_id')->where('relationships.status', '=', '1')
            ->where('relationships.sender_id', '=', $id)
                ->orWhere('relationships.receiver_id', '=', $id);
            $join->orOn('users.id', '=', 'relationships.receiver_id')->where('relationships.status', '=', '1')
                ->where('relationships.sender_id', '=', $id)
                ->orWhere('relationships.receiver_id', '=', $id);
        })->get(); 
        // dd($friends);
        $this->setPageTitle('Friend of user','Friend of user');
        return view('site.friends.show',compact('user','friends'));
    }

    public function block(Request $request)
    {
        if($request->ajax())
        {
            $me = User::where('name', Auth::user()->name)->first();
            $user = User::where('name', $request->name)->first();
            $me->block($user);
            $count = $user->blocking();
            return response()->json(['count' => $count]);
        }
    }

    public function unBlock(Request $request)
    {
        if ($request->ajax()) {
            $me = User::where('name', Auth::user()->name)->first();
            $user = User::where('name', $request->name)->first();
            $me->unBlock($user);
            $count = $user->blockers();
            return response()->json(['count' => $count]);
        }
    }
}
