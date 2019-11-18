<?php 

namespace App\Repositories;

use App\ProductCategory;

use App\Repositories\Repository;
use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends Repository implements ProductCategoryRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductCategory;
        $this->setModel($this->model);
    }

    public function getProducts($category_id)
    {
        $products = $this->model
            ->with('products')
            ->where('id', $category_id)
            ->first()->products;

        return $products;
    }
}