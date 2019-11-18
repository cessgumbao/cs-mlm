<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'cost', 'tax', 'product_category_id', 'image', 'is_set'];

    public function product_category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id');
    }
}
