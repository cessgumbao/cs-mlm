<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModeOfPaymentRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\SaleRepository;

use Auth;

class SaleController extends Controller
{
    protected $sale_repo;
    protected $product_category_repo;
    protected $mode_of_payment_repo;
    protected $rules;
    protected $messages;

    public function __construct()
    {
        $this->sale_repo = new SaleRepository;
        $this->product_category_repo = new ProductCategoryRepository;
        $this->mode_of_payment_repo = new ModeOfPaymentRepository;
    }

    public function index()
    {
        return view('sales.index');
    }

    public function getSalesOrders($sales_id)
    {
        $sales_order = $this->sale_repo->getSalesOrders($sales_id);
        return json_encode($sales_order);
    }

    public function create()
    {
        $product_categories = $this->product_category_repo->all();
        $mode_of_payments = $this->mode_of_payment_repo->all();
        
        return view('sales.create')->with([
            'categories' => $product_categories,
            'mode_of_payments' => $mode_of_payments
        ]);
    }

    public function validateSaleForm(Request $request)
    {
        $result = $this->sale_repo->validateSaleForm($request);
        return $result;
    }

    public function store(Request $request)
    {
        $result = $this->sale_repo->completeSale($request);
        return $result;
    }

    public function generateComputation(Request $request)
    {
        $computation = $this->sale_repo->generateComputation($request);
        return $computation;
    }
}
