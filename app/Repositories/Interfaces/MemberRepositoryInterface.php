<?php

namespace App\Repositories\Interfaces;

use App\Member;

interface MemberRepositoryInterface
{
    public function all();
    public function searchMember($request);
    public function getLastSequence();
    public function checkMemberIfExist($member_id);
    public function getProfile($member_id);
}