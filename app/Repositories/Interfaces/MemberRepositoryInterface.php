<?php

namespace App\Repositories\Interfaces;

interface MemberRepositoryInterface
{
    public function all();
    public function searchMember($request);
    public function getLastSequence();
    public function checkMemberIfExist($member_id);
    public function getCompleteProfile($member_id);
    public function checkProfile($request);
}