<?php

namespace App\Services\VoteRules;

interface VoteRuleInterface
{
    public function validate($voterId, $candidateId): void;
}
