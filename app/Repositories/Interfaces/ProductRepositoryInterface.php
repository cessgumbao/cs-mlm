<?php

namespace App\Repositories\Interfaces;

use App\Product;

interface ProductRepositoryInterface
{
    public function getProducts($request);
}