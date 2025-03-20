<?php

namespace App\Services;

use App\Repositories\Concretes\UserRepository;
use App\Repositories\Concretes\VoteRepository;
use App\Repositories\Interfaces\VoteRepositoryInterface;

class VoteService
{
    protected $_voteRepository;
    protected $voteRules;
    public function __construct(VoteRepositoryInterface  $voteRepository,array $voteRules ){ //Use Dependency injection
        $this->_voteRepository = $voteRepository;
        $this->voteRules = $voteRules;
    }

    /**
     This function violate Open/Closed Principle (OCP) , To Fix that,we can use the ((Strategy Pattern)). This allows us to add new voting rules without modifying the existing code.
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
     *
     * */

    ///////New vote function///////////
    public function vote($voterId, $candidateId)
    {
        // Apply all vote rules dynamically
        foreach ($this->voteRules as $rule) {
            $rule->validate($voterId, $candidateId);
        }
        return $this->_voteRepository->createVote($voterId, $candidateId);
    }

    public function getUsersWithVoteCounts()
    {
        return $this->_voteRepository->usersWithVoteCounts();
    }
}
