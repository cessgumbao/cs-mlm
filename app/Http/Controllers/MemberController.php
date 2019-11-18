<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\MemberRepositoryInterface;

use Validator;
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
        return view('members.index')->withMembers($members);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        echo $request->all();
        exit;
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        $validatedData = $request->validate( $this->rules );
        echo $validatedData;
        exit;

        if ($validator->fails()) 
        {
            echo json_encode($validator->errors());
            exit;
        }
            // return ["success" => false, "error" => $validator->errors()->first()];
        else 
        {

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $result = $this->member_repo->searchMember($request);
        return $result;
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'member_id' => [
                'exists:members,member_id',
                function ($attribute, $value, $fail) {
                    if ($value === Auth::user()->members->member_id) {
                        $fail('You cannot use your own ID');
                    }
                },
            ],
        ], [ 'member_id.exists' => __('validation.exists', ['attribute' => 'Member ID']) ]);

        if ($validator->fails())
            return [ 'success' => false, 'error' => $validator->errors()->first() ];
        else
        {
            $member_profile = $this->member_repo->getProfile($request->member_id);
            return [ 'success' => true, 'member_profile' => $member_profile ];
        }
    }
}
