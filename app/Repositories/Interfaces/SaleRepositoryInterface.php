<?php

namespace App\Repositories\Interfaces;

interface SaleRepositoryInterface
{
    public function getMemberSales($user_id, $request);
    public function completeSale($request);
    public function getSalesOrders($sales_id);
    public function generateComputation($request);
    public function validateSaleForm($request);
}