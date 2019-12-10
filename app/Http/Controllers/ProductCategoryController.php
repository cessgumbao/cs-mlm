<?php

namespace App\Http\Controllers;

use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    protected $product_category_repo;

    public function __construct()
    {
        $this->product_category_repo = new ProductCategoryRepository;
    }

    public function getProducts($product_category_id)
    {
        $products = $this->product_category_repo->getProducts($product_category_id);
        return json_encode($products);
    }
}
