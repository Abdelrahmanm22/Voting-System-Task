<?php

namespace App\Services;

use App\Repositories\Concretes\UserRepository;
use App\Repositories\Concretes\VoteRepository;
use App\Repositories\Interfaces\VoteRepositoryInterface;

class VoteService
{
    protected $_voteRepository;
    public function __construct(VoteRepositoryInterface  $voteRepository ){ //Use Dependency injection
        $this->_voteRepository = $voteRepository;
    }

    public function vote($voterId,$candidateId)
    {

        //Check if User not approved for voting
        if (!$this->_voteRepository->canVote($voterId) || !$this->_voteRepository->canVote($candidateId)) {
            throw new \Exception('User not approved for voting');
        }


        //Check if Cannot vote for yourself
        if ($voterId==$candidateId) {
            throw new \Exception('Cannot vote for yourself');
        }

        //Check if Voter have already voted for this candidate
        if($this->_voteRepository->userHasVoted($voterId,$candidateId)){
            throw new \Exception('Already voted for this candidate');
        }

        return $this->_voteRepository->createVote($voterId,$candidateId);
    }
    public function getUsersWithVoteCounts()
    {
        return $this->_voteRepository->usersWithVoteCounts();
    }
}
