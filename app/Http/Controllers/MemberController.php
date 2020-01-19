<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Repositories\SaleRepository;
use Auth;

class MemberController extends Controller
{
    protected $member_repo;
    protected $rules;
    protected $messages;

    public function __construct(MemberRepositoryInterface $member_repo)
    {
        $this->member_repo = $member_repo;
        $this->rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required'
        ];
        $this->messages = [
            'city.required' => __('validation.required', ['attribute' => 'City']),
            'region.required' => __('validation.required', ['attribute' => 'Region']),
        ];
    }

    public function index()
    {
        $members = $this->member_repo->all();   
        if(Auth::user()->hasPermission('browse_members')) return view('members.index')->withMembers($members);
        else abort(403, 'Unauthorized action.');
    }

    public function showProfile($member_id)
    {
        $profile = $this->member_repo->getCompleteProfile($member_id);
        return view('profile')->withProfile($profile);
    }

    public function search(Request $request)
    {
        $result = $this->member_repo->searchMember($request);
        return $result;
    }

    public function check(Request $request)
    {
        $result = $this->member_repo->checkProfile($request);
        return $result;
    }

    public function getSales($user_id, Request $request)
    {
        $sale_repo = new SaleRepository;
        $sales = $sale_repo->getMemberSales($user_id, $request);   
        return ['total' => $sales['total'], 'rows' => $sales['sales']];
    }
}
