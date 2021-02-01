<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;
use Response;
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
        $posts = Post::with(['images', 'users', 'categories'])->get();
        // dd($posts);
        $categories = Category::all();

        $this->setPageTitle("Index posts","Index posts");

        return view('admin.posts.index',compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        $posts = Post::with(['users','categories'])->get();
        $this->setPageTitle("Posts map","Posts map");
        return view('admin.posts.map',compact('posts'));
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
        $post->category_id = $request->get('category_id');
        $post->id = Auth::user()->admin_id;

        $post->save();
        if ($request->hasFile('image_upload')) {
            $images = $request->file('image_upload');
            foreach ($images as $image) {

                $image->storeAs('public/posts/', $image->getClientOriginalName());

                $postImage = new PostImage([
                    'post_image_path'      =>  $image->getClientOriginalName(),
                    'post_id' => $post->post_id
                ]);

                $post->images()->save($postImage);
            }
        }
        if (!$post) {
            return $this->responseRedirectBack('Error occurred while updating post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.posts.index', 'Post added successfully', 'success', false, false);
    }

    public function accept(Request $request, $id)
    {
        $post = $this->postRepository->findPostById($id);

        $post->post_status = 'accepted';

        $post->update();

        if (!$post) {
            return $this->responseRedirectBack('Error occurred while accept post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.posts.index', 'Post accept successfully', 'success', false, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with(['images', 'users', 'categories'])->find($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $post = Post::find($id)->delete();
        if (!$post) {
            return $this->responseRedirectBack('Error occurred while delete post.', 'error', true, true);
        }
        return $this->responseRedirect('admin.posts.index', 'Post deleted successfully', 'success', false, false);
    }

    public function destroyImage($id)
    {
        $postImage = PostImage::find($id)->delete();
        if (!$postImage) {
            return $this->responseRedirectBack('Error occurred while delete image post.', 'error', true, true);
        }
        return $this->responseRedirectBack('Image of post deleted successfully', 'success', false, false);
    }

    public function indexBlockUsers()
    {
        $posts = Post::with('users')->get();
        // dd($posts);
        $this->setPageTitle("Index Block User","Index Block User");
        return view('admin.posts.indexBlockUsers',compact('posts'));
    }

    public function blockAjax(Request $request)
    {
        if(request()->ajax()){
            $block = DB::table('posts')
            ->where('post_id', $request->get('postId'))
                ->update(['status_user' => 'blocked']);
            // block in table users
            $user = DB::table('users')
                ->where('id', $request->get('userId'))
                ->update(['is_block' => 'blocked']);
            return Response::json(['status' => 'Block successfully!']);
        }else{
            return Response::json(['status' => 'Block fail!']);
        }
    }

    public function unblockAjax(Request $request)
    {
        if (request()->ajax()) {
            $block = DB::table('posts')
                ->where('post_id', $request->get('postId'))
                ->update(['status_user' => 'normal']);
            // block in table users
            $user = DB::table('users')
                ->where('id',$request->get('userId'))
                ->update(['is_block' => 'normal']);
            return Response::json(['status' => 'Unblock successfully!']);
        } else {
            return Response::json(['status' => 'Unblock fail!']);
        }
    }
}
