<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcashEarning extends Model
{
    protected $table = "ecash_earnings";
    protected $fillable = ['sales_id', 'ecash_earned'];

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sales_id');
    }
}
