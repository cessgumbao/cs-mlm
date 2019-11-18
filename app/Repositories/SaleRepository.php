<?php 

namespace App\Repositories;

use App\MemberRank;
use App\Sale;

use App\Repositories\Repository;
use App\Repositories\MemberRepository;
use App\Repositories\Interfaces\SaleRepositoryInterface;

use Auth,Validator;

class SaleRepository extends Repository implements SaleRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Sale();
        $this->setModel($this->model);
    }

    public function validateSaleForm($request)
    {   
        $net_amount = floatval(str_replace(',','', $request->net_amount));
        $payment = floatval(str_replace(',', '', $request->payment));

        $validator = Validator::make($request->all(), [
            'ecash_used' => [
                function ($attribute, $value, $fail) use ($net_amount) 
                {
                    $ecash_used = floatval(str_replace(',', '', $value));
                    if ($ecash_used > $net_amount ) $fail(' Cash in wallet used cannot exceed the net amount.');
                },
                function ($attribute, $value, $fail) use ($payment, $net_amount) 
                {
                    $ecash_used = floatval(str_replace(',', '', $value));
                    if ( ($ecash_used + $payment) < $net_amount ) $fail(' Invalid payment amount.');
                },
            ],
            'payment_change' => [
                function ($attribute, $value, $fail) {
                    $payment_change = floatval(str_replace(',', '', $value));
                    if ($payment_change < 0 ) $fail(' Invalid payment amount.');
                },
            ],
        ]);

        if ($validator->fails())
            return [ 'success' => false, 'error' => $validator->errors()->first() ];
        else
        {
            return [ 'success' => true ];
        }
    }

    public function completeSale($request)
    {
        $net_amount = floatval(str_replace(',','', $request->net_amount));
        $payment = floatval(str_replace(',', '', $request->payment));
        $payment_change = floatval(str_replace(',', '', $request->payment_change));
        $ecash_used = floatval(str_replace(',', '', $request->ecash_used));

        $member_repo = new MemberRepository;
        $member = $member_repo->getProfile($request->member_id);

        $sales = $this->model->create([
            'buyer_id' => $member->user_id,
            'seller_id' => Auth::user()->id,
            'total_amount' => $request->total_amount,
            'net_amount' => $net_amount,
            'discount' => $request->discount,   
            'ecash_amount_used' => $ecash_used,
            'mode_of_payment_id' => $request->mode_of_payment,
            'payment' => $payment,
            'payment_change' => $payment_change,
        ]);

        return redirect('sales')->with('status', 'Successfully saved!');
    }

    public function generateComputation($request)
    {
        $products = $request->products;
        $member_profile = $request->member_profile;

        $total_amount = 0;
        $discount = 0;
        $net_amount = 0;
        $overriding_commision = 0;

        $has_set = false;
        $set_ctr = 0;

        foreach($products as $product)
        {
            $total_amount += ($product['quantity'] * $product['cost']);

            if ($product['is_set'])
            {
                $set_ctr += $product['quantity'];
            }
        }

        // Check if he/she has two sets
        if ($set_ctr > 1) $has_set = true;

        switch ($member_profile['role_id']) 
        {
            case "2":
                // Apply 3 member star discount if he/she has two sets
                if ($has_set)
                {
                    $discount_percentage = MemberRank::where('id', 1)->first()->discount;
                    $discount = ($discount_percentage/100) * $total_amount;
                    $net_amount = $total_amount - $discount;
                }
                else
                {
                    $discount = 0;
                }
                
                $net_amount = $total_amount - $discount;
                break;

            case 6:
                //
                break;
            default:
                # code...
                break;
        }

        return [
            'total_amount' => $total_amount, 
            'discount' => $discount, 
            'net_amount' => $net_amount,
            'overriding_commission' => $overriding_commision,
        ];
    }
}