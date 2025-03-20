<?php

namespace App\Services\VoteRules;
use App\Repositories\Interfaces\VoteRepositoryInterface;
use Exception;
class NoDuplicateVoteRule
{
    protected $voteRepository;

    public function __construct(VoteRepositoryInterface $voteRepository)
    {
        $this->voteRepository = $voteRepository;
    }
    public function validate($voterId, $candidateId): void
    {
        if ($this->voteRepository->userHasVoted($voterId, $candidateId)) {
            throw new Exception('Already voted for this candidate');
        }
    }
}
