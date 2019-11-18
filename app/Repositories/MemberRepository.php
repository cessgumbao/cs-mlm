<?php 

namespace App\Repositories;

use App\Member;

use App\Repositories\Repository;
use App\Repositories\Interfaces\MemberRepositoryInterface;

class MemberRepository extends Repository implements MemberRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Member();
        $this->setModel($this->model);
    }

    public function searchMember($request)
    {
        $member_data = [
            'members.id',
            'members.member_id',
            'members.first_name',
            'members.last_name',
            'members.city',
            'members.region',
        ];

        $member = $this->model
            ->leftJoin('users', 'users.id', '=', 'members.user_id')
            ->where('members.first_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('members.last_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('members.city', 'LIKE', '%' . $request->search . '%')
            ->orWhere('members.region', 'LIKE', '%' . $request->search . '%')
            ->select($member_data)
            ->get();

        return $member;
    }

    public function getLastSequence()
    {
        $sequence = $this->model
            ->whereMonth('updated_at', '=', date('m'))
            ->whereYear('updated_at', '=', date('Y'))
            ->orderBy('sequence', 'desc')
            ->first();

        return $sequence;
    }

    public function checkMemberIfExist($member_id)
    {
        $member = $this->model->where('member_id', '=', $member_id)->first();
        return isset($member) ? 'true' : 'false';
    }

    public function getProfile($member_id)
    {
        $member_data = [
            'roles.id as role_id',
            'members.user_id',
            'members.member_id',
            'members.city',
            'members.region',
            'users.name as member_name',
            'member_ranks.name as rank',
            'member_ranks.discount',
            'member_rank_criterias.ecash_reward',
            'member_ecash.ecash'
        ];

        $member_profile = $this->model
            ->leftJoin('users', 'users.id', '=', 'members.user_id')
            ->leftJoin('member_classifications', 'member_classifications.member_id', '=', 'members.id')
            ->leftJoin('member_ecash', 'users.id', '=', 'member_ecash.user_id')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->leftJoin('member_rank_criterias', 'member_rank_criterias.role_id', '=', 'roles.id')
            ->leftJoin('member_ranks', 'member_rank_criterias.member_rank_id', '=', 'member_ranks.id')
            ->where('members.member_id', '=', $member_id )
            ->select($member_data)
            ->first();

        return $member_profile;
    }
}