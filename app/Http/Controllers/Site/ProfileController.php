<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Relationship;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Post;
class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['images', 'users', 'categories', 'comments'])
        ->withAndWhereHas('users', function ($query) {             // withAndWhereHas from Room Model function
            $query->with('comments');
        })->where([
            ['post_status', 'accepted'],
            ['user_id','=',Auth::user()->id]
        ])
        ->orderBy('post_id', 'DESC')->get();
        $friends = DB::table('relationships')
        ->leftJoin('users', function($join) {
            $join->on('users.id','=','relationships.sender_id');
            $join->orOn('users.id','=', 'relationships.receiver_id');
        })
        ->where('relationships.sender_id',Auth::user()->id)
        ->orWhere('relationships.receiver_id',Auth::user()->id)
        ->where('status','=','1')
        ->get();

        $count_friends = DB::table('relationships')
        ->leftJoin('users', function ($join) {
            $join->on('users.id', '=', 'relationships.sender_id');
            $join->on('users.id', '=', 'relationships.receiver_id');
        })
        ->select(DB::raw('count(status) as count_friend'))
        ->where('relationships.sender_id', Auth::user()->id)
        ->orWhere('relationships.receiver_id', Auth::user()->id)
        ->where('status', '=', '1')
        ->groupBy('relationships.status')
        ->get();
        $sumFriend = 0;
        foreach ($count_friends as $key => $value) {
            (int)$sumFriend += (int)$value->count_friend;
        }
        $this->setPageTitle('Profile Settings', 'Profile Settings');
        return view('site.profiles.index',compact('posts','count_friends','friends', 'sumFriend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountSettings()
    {
        $this->setPageTitle('Account Settings','Account Settings');
        return view('site.accounts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['wards', 'posts'])->find($id);
        $this->setPageTitle("Show profile","Show profile");
        return view('site.profiles.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function uploadImage(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->move(public_path().'/storage/users-avatar/', $image->getClientOriginalName());
            

            $user = User::find($id);
            $user->avatar = $image->getClientOriginalName();

            $user->update();
        }
        if (!$user) {
            return $this->responseRedirectBack('Error occurred while updating avatar.', 'error', true, true);
        }
        return $this->responseRedirect('site.profile.index', 'Updating avatar successfully', 'success', false, false);
    }
}
