<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";
    protected $fillable = ['user_id', 'referral_code', 'first_name', 'middle_name', 'last_name', 'address', 'city', 'region', 'gender', 'verified', 'member_id', 'sequence'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
