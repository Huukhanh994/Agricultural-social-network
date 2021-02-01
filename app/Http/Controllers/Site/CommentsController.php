<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentsController extends Controller
{
    public function index()
    {
        // $comments = Post::with('comments')->withAndWhereHas('comments', function ($query) {             // withAndWhereHas from Room Model function
        //     $query->with('user');
        // })
        // ->get();
        
        // $count_friend = Relationship::with(['sender_user', 'receiver_user'])->select(DB::raw('count(*) as count_friend'))
        // ->where('status', '=', '1')
        // ->where('sender_id', '=', Auth::user()->id)
        // ->orWhere('receiver_id', '=', Auth::user()->id)
        // ->groupBy('status')
        // ->get();
        
        // return view('site.posts.commentsDisplay',compact('count_friend','comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => 'required',
        ]);

        $input = $request->all();
        
        Comment::create($input);

        return back();
    }
}
