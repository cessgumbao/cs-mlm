<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Repositories\MemberRepository;
use App\Repositories\RegisterRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $register_repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->register_repo = new RegisterRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return $this->register_repo->validate($data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_repo = new UserRepository;
        $user = $user_repo->create([
            'role_id' => 2,
            'name' => $data['first_name'] . " " . $data['middle_name'] . " " . $data['last_name'],
            'avatar' => 'users/default.png',
            'email' => $data['email'],
            'password' => Hash::make(Str::random(8)),
            'settings' => '{"locale":"en"}',
        ]);

        $this->createMember($data, $user);
        return $user;
    }

    protected function createMember($data, $user)
    {
        $member_repo = new MemberRepository;

        // member_id = YYMM4DIGITSEQUENCE ex. 11160001, 12250010
        $last_sequence = $member_repo->getLastSequence();
        $member_id = isset($last_sequence) ? date('y') . date('m') .sprintf('%04d', $last_sequence->sequence+1) : date('y') . date('m') . '0001';
        $sequence = isset($last_sequence) ? $last_sequence->sequence + 1 : 1;

        $member_repo->create([
            'user_id' => $user->id,
            'member_id' => $member_id,
            'sequence' => $sequence,
            'referral_code' => $data['referral_code'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'birtdate' => $data['birthdate'],
            'address' => $data['address'],
            'city' => $data['city'],
            'region' => $data['region'],
            'gender' => $data['gender'],
            'verified' => 0
        ]);
    }
}
