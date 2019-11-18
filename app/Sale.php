<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = ['buyer_id', 'seller_id', 'total_amount', 'net_amount', 'discount', 'ecash_amount_used', 'mode_of_payment_id', 'payment', 'payment_change'];

    public function ecash_earning()
    {
        return $this->hasOne('App\EcashEarning', 'sales_id', 'id');
    }

    public function sales_order()
    {
        return $this->hasMany('App\SalesOrder', 'sales_id', 'id');
    }
}
