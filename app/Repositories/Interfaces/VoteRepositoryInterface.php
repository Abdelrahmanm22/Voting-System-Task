<?php

namespace App\Repositories\Interfaces;

interface VoteRepositoryInterface
{
    public function createVote($voterId, $candidateId);
    public function canVote($userId);
    public function userHasVoted($voterId, $candidateId);
}
