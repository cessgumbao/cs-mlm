<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'display_name'];

    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }
    
    public function member_rank_criterias()
    {
        return $this->hasMany('App\MemberRankCriteria', 'role_id', 'id');
    }
}
