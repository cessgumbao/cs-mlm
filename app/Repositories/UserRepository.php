<?php

namespace App\Repositories;

use App\User;

use App\Repositories\Repository;

use Validator, Auth;

class UserRepository extends Repository 
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
        $this->setModel($this->model);
    }
}
