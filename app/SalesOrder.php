<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = "sales_orders";
    protected $fillable = ['product_id', 'quantity', 'total_cost', 'sales_id'];

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sales_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
