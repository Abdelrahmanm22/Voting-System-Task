<?php

namespace App\Services\VoteRules;

use App\Repositories\Interfaces\VoteRepositoryInterface;
use Exception;
class UserApprovalRule implements VoteRuleInterface
{
    protected $voteRepository;

    public function __construct(VoteRepositoryInterface $voteRepository)
    {
        $this->voteRepository = $voteRepository;
    }

    public function validate($voterId, $candidateId): void
    {
        if (!$this->voteRepository->canVote($voterId) || !$this->voteRepository->canVote($candidateId)) {
            throw new Exception('User not approved for voting');
        }
    }
}
