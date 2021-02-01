<?php
namespace App\Contracts;

interface PostContract
{
    public function listPosts(string $order = 'post_id',string $sort = 'desc',array $columns = ['*']);

    public function findPostById(int $id);

    public function createPost(array $params);

    public function updatePost(array $params);

    public function deletePost($id);

}