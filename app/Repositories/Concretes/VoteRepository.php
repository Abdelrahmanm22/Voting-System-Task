<?php

namespace App\Repositories\Concretes;

use App\Models\User;
use App\Models\Vote;
use App\Repositories\Interfaces\VoteRepositoryInterface;

class VoteRepository implements VoteRepositoryInterface
{

    public function createVote($voterId, $candidateId)
    {
        return Vote::create(['voter_id' => $voterId, 'candidate_id' => $candidateId]);
    }
    public function canVote($userId){
        return User::find($userId)->canVote();
    }

    public function userHasVoted($voterId, $candidateId)
    {
        return Vote::where(['voter_id' => $voterId, 'candidate_id' => $candidateId])->exists();
    }
}
