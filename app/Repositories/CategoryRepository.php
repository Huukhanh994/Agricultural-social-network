<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order = 'category_id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }


    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {
            
            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile))
            {
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $merge = $collection->merge(compact('image'));

            $category = new Category($merge->all());

            $category->save();

            return $category;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['category_id']);

        $collection = collect($params)->except('_token');

        $category->update($collection->all());

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if($category->image != null)
        {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
        ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}