<?php

namespace App\Repositories\Interfaces;

use App\ProductCategory;

interface ProductCategoryRepositoryInterface
{
    public function getProducts($category_id);
}