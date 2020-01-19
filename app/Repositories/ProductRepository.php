<?php 

namespace App\Repositories;

use App\Product;

use App\Repositories\Repository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product;
        $this->setModel($this->model);
    }

    public function getProducts($request)
    {
        $column = [
            'products.name',
            'products.image',
            'products.cost',
            'product_categories.id as category'
        ];

        $products = $this->model
            ->leftJoin('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->select($column)
            ->orderBy($request->sort ?? 'products.id', $request->order)
            ->offset($request->offset)
            ->limit($request->limit)
            ->get();

        // Total count
        $count = $this->model
            ->leftJoin('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->select($column)
            ->get()
            ->count();

        return [ 'products' => $products, 'total' => $count];
    }
}