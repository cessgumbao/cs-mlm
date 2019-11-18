<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRank extends Model
{
    protected $table = "member_ranks";
    protected $fillable = ['name', 'description', 'discount'];

    public function member_rank_criterias()
    {
        $this->hasMany('App\MemberRankCriteria', 'member_rank_id', 'id');
    }
}
