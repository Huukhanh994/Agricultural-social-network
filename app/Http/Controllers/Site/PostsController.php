<?php

namespace App\Http\Controllers\Site;

use App\Contracts\PostContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageGroup;
use App\Models\Comment;
use App\Models\Poll as ModelsPoll;
use App\Models\PostLike;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Save;
use Inani\Larapoll\Poll;
use GNAHotelSolutions\Weather\Weather;

class PostsController extends BaseController
{
    protected $postRepository;

    public function __construct(PostContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if(Auth::check()){
            $friends = User::with(['wards', 'posts', 'senderRelationships', 'receiverRelationships'])
            ->whereDoesntHave('receiverRelationships')
            ->where('users.id', '!=', Auth::user()->id)->get();

            $request_friends = Relationship::with('sender_user')->where([
                ['receiver_id', '=', Auth::user()->id],
                ['status', '=', '0'],
            ])->get();
            
            $yourGroup = DB::table('users')->join('group_users', 'users.id', '=', 'group_users.id')
            ->join('groups', 'group_users.group_id', '=', 'groups.group_id')
            ->join('categories', 'groups.category_id', '=', 'categories.category_id')
            ->select('groups.*', 'categories.category_name')
            ->where('users.id', '=', Auth::user()->id)
            ->where('group_users.group_status','=',1)
            ->get();

            $messages = Message::with(['sender_user', 'receiver_user'])->where('from_id', '=', Auth::user()->id)->orWhere('to_id', '=', Auth::user()->id)->get();

            $count_friend = Relationship::with(['sender_user', 'receiver_user'])->select(DB::raw('count(*) as count_friend'))
            ->where('status', '=', '1')
            ->where('sender_id', '=', Auth::user()->id)
            ->orWhere('receiver_id', '=', Auth::user()->id)
            ->groupBy('status')
            ->get();
            
            $notification_friends = Relationship::with('receiver_user')->where([
                ['sender_id', '=', Auth::user()->id],
                ['status', '=', '1']
            ])->get();

            $notification_comments = Comment::with(['user', 'post'])->where('user_id', '=', Auth::user()->id)->get();

            $notification_exp_likes = DB::table('experience_farms')->rightJoin('experience_farm_likes', function ($join) {
                $join->on('experience_farms.experience_farm_id', '=', 'experience_farm_likes.experience_farm_id');
            })
                ->join('users', 'experience_farms.user_id', '=', 'users.id')
                ->where('experience_farms.user_id', '=', Auth::user()->id)
                ->get();
            $saves = Save::with('user')->whereHas('user', function ($q) {
                $q->where('users.id', '=', Auth::user()->id);
            })->get();
        }else{
            $friends = 0;

            $request_friends = array(0);

            $yourGroup = 0;

            $messages = 0;

            $count_friend = 0;

            $notification_friends = 0;

            $notification_comments = 0;

            $notification_exp_likes = 0;
            $saves = 0;
        }
        // DANG LAM BAN CHUNG
        // dd(User::withCount('receiverRelationships')->whereHas('receiverRelationships', function($q){
        //     $q->where('status','=','1');
        // })->where('user_id','=',Auth::user()->user_id)->get());

        $users = User::all();
        $posts = Post::with(['images', 'users', 'categories', 'comments'])
            ->withCount('comments')
            ->where('post_status', 'accepted')
            ->orderBy('post_id', 'DESC')->paginate(10);
        $groups = Group::all();
        $product = Product::with('categories')->get();

        $polls = Poll::with('user')->get();
        $this->setPageTitle("Agricultural social network", "Agricultural social network");
        return view('site.pages.home', compact('categories', 'posts', 
        'groups', 'friends', 
        'request_friends','notification_exp_likes',
        'count_friend', 'messages', 
        'product', 'polls', 
        'notification_friends', 'notification_comments'
        ,'yourGroup','users','saves'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSlug(Request $request, $slug)
    {
        $post = Post::where('post_slug', $slug)->first();
        $comments = Post::join('comments', 'posts.post_id', '=', 'comments.post_id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.*')
            ->where('posts.post_slug', '=', $slug)
            ->get();
        // dd($comments);
        return view('site.posts.show', compact('post', 'comments'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequestLike(Request $request)
    {
        $post = Post::find($request->id);

        $response = Auth::user()->hasLiked($post);

        return response()->json(['success' => $response]);
    }

    public function ajaxRequestDisLike(Request $request)
    {
        $post_dis = Post::find($request->post_dis_id);

        $respose_dis = Auth::user()->unlike($post_dis);

        return response()->json(['success_dis' => $respose_dis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->post_slug = Str::slug($request->get('post_title'));
        $post->post_title = $request->get('post_title');
        $post->post_content = $request->get('post_content');
        $post->post_price = $request->get('post_price');
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->get('category_id');
        $post->post_lat = $request->get('lat');
        $post->post_lng = $request->get('lng');
        $post->post_requestIp = $request->get('requestIp');
        $post->save();
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $image->move(public_path('images/posts'), $image->getClientOriginalName());

                $postImage = new PostImage([
                    'post_image_path' =>  $image->getClientOriginalName(),
                    'post_id' => $post->post_id
                ]);

                $post->images()->save($postImage);
            }
        }
        $post->groups()->attach($post, ['group_id' => $request->get('group_id')]);
        $post->groups()->detach($post);
        if (!$post) {
            return redirect()->back()->with('error', 'Cannot create post!');
        }
        return redirect()->route('site.pages.home')->with('success', 'Post added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setPageTitle("Show Post", "Show Post");
        $post = Post::with(['images', 'users', 'categories'])->find($id);
        $comments = Post::join('comments', 'posts.post_id', '=', 'comments.post_id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.*')
            ->where('posts.post_id', '=', $id)
            ->get();
        return view('site.posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('categories')->find($id);
        $categories = Category::all();
        $this->setPageTitle('Edit post','Edit post');
        return view('site.posts.edit', compact('post', 'categories'));
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
        $post = Post::find($id);
        $post->post_title = $request->get('post_title');
        $post->post_content = $request->get('post_content');
        $post->category_id = $request->get('category_id');
        $post->update();
        return redirect(route('site.posts.edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        if (!$post) {
            return $this->responseRedirectBack('Error occurred while delete post.', 'error', true, true);
        }
        return $this->responseRedirect('site.pages.home', 'Delete post successfully', 'success', false, false);
    }

    public function rating(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);

        return redirect()->route("site.posts.show", $request->id);
    }

    public function maps()
    {
        $posts = Post::with(['users', 'categories'])->get();
        $this->setPageTitle("Posts map", "Posts map");
        return view('site.posts.maps',compact('posts'));
    }
    public function like(Request $request)
    {
        $post = Post::find($request->postId);
        $value = $post->post_like;
        $post->post_like = $value + 1;
        $post->update();
        return response()->json([
            'post_like' => $post->post_like,
        ]);
    }

    public function dislike(Request $request)
    {
        $post = Post::find($request->postId);
        $value = $post->post_dislike;
        $post->post_dislike = $value + 1;
        $post->update();
        return response()->json([
            'post_dislike' => $post->post_dislike,
        ]);
    }

    public function indexSummernote()
    {
        $this->setPageTitle("Create post Summernote","Create post Summernote");
        $categories = Category::all();
        return view('site.posts.create-summernote',compact('categories'));
    }

    public function storeSummernote(Request $request)
    {
        $post = new Post();
        $post->post_title = $request->get('post_title');
        $post->post_slug = Str::slug($post->post_title);
        $post->category_id = $request->get('category_id');
        $post->post_content = $request->input('post_content');
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect(route('site.pages.home'));

    }
}
