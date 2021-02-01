<?php

namespace App\Contracts;

/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface CategoryContract
{
    public function listCategories(string $order = 'category_id', string $sort = 'desc', array $columns = ['*']);

    public function findCategoryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCategory(array $params);

    public function updateCategory(array $params);

    public function deleteCategory($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
