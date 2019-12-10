<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = "distributors";
    protected $fillable = ['member_id', 'role_id', 'is_active'];
}
