<?php

namespace App\Repositories;

use App\Models\Post;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\PostContract;
use App\Models\PostImage;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostRepository extends BaseRepository implements PostContract
{
    use UploadAble;
    
    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    
    public function listPosts(string $order = 'post_id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    public function findPostById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createPost(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;
            // if has update image && and get attribute in image
            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'posts');
            }
            $post_status = 'pending';

            $post_published = 1;

            $post_slug = Str::slug($params['post_content']);

            $user_id = Auth::user()->id;
            
            $merge = $collection->merge(compact('post_status', 'post_published','post_slug','image','user_id'));
            
            $posts = new Post($merge->all());
            
            $posts->save();
            
            $postImage = new PostImage([
                'post_image_path'      =>  $image,
                'post_id' => $posts->post_id
            ]);

            $posts->images()->save($postImage);

            return $posts;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updatePost(array $params)
    {
        
    }

    public function deletePost($id)
    {
        
    }
}