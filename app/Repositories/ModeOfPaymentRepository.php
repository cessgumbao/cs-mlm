<?php 

namespace App\Repositories;

use App\ModeOfPayment;

use App\Repositories\Repository;
use App\Repositories\Interfaces\ModeOfPaymentRepositoryInterface;

class ModeOfPaymentRepository extends Repository implements ModeOfPaymentRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new ModeOfPayment();
        $this->setModel($this->model);
    }
}