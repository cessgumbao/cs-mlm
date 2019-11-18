<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = "sales_orders";
    protected $fillable = ['product_id', 'quantity', 'total_cost'];

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sales_id');
    }
}
