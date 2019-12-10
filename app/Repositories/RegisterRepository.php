<?php

namespace App\Repositories;

use App\Member;

use App\Repositories\Repository;
use App\Repositories\Interfaces\RegisterRepositoryInterface;

use Validator, Auth;

class RegisterRepository extends Repository implements RegisterRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Member();
        $this->setModel($this->model);
    }

    public function validate($data)
    {   
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'city' => ['required'],
            'region' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'referral_code' => [
                function ($attribute, $value, $fail)
                {
                    $member = $this->model->where('referral_code', $value);
                    if (!$member->count()) $fail('Invalid referral code');
                }
            ],
        ]);
    }
}
