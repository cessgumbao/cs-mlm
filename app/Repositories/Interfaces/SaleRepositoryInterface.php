<?php

namespace App\Repositories\Interfaces;

use App\Sale;

interface SaleRepositoryInterface
{
    public function getMySales($my_id);
    public function completeSale($request);
    public function generateComputation($request);
    public function validateSaleForm($request);
}