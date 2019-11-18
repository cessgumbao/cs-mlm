<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Repositories\Interfaces\MemberRepositoryInterface;

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

    protected $member_repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberRepositoryInterface $member_repo)
    {
        $this->middleware('guest');
        $this->member_repo = $member_repo;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'city' => ['required'],
            'region' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'role_id' => 2,
            'name' => $data['first_name'] . " " . $data['middle_name'] . " " . $data['last_name'],
            'avatar' => 'users/default.png',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'settings' => '{"locale":"en"}',
        ]);

        // member_id = YYMM4DIGITSEQUENCE ex. 11160001, 12250010
        $last_sequence = $this->member_repo->getLastSequence();
        $member_id = isset($last_sequence) ? date('y') . date('m') .sprintf('%04d', $last_sequence->sequence+1) : date('y') . date('m') . '0001';
        $sequence = isset($last_sequence) ? $last_sequence->sequence + 1 : 1;

        Member::create([
            'user_id' => $user->id,
            'member_id' => $member_id,
            'sequence' => $sequence,
            'referral_code' => $data['referral_code'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'region' => $data['region'],
            'gender' => $data['gender'],
            'verified' => 0
        ]);

        return $user;
    }
}
