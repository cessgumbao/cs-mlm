<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRankCriteria extends Model
{
    protected $table = "member_rank_criterias";
    protected $fillable = ['member_rank_id', 'role_id', 'ecash_reward', 'min_sales_requirement'];

    public function member_rank()
    {
        return $this->belongsTo('App\MemberRank', 'member_rank_id', 'id');
    }
}
