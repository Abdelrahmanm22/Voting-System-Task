<?php

namespace App\Services\VoteRules;
use Exception;
class NoSelfVoteRule implements VoteRuleInterface
{
    public function validate($voterId, $candidateId): void
    {
        if ($voterId == $candidateId) {
            throw new Exception('Cannot vote for yourself');
        }
    }
}
