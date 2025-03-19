<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VoteService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VoteController extends Controller
{
    use ApiResponseTrait;
    protected $voteService;
    public function __construct(VoteService $voteService)
    {
        $this->voteService = $voteService;
    }
    public function vote(Request $request){

        $validator = Validator::make($request->all(), [
            'candidate_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors()->first(), 400);
        }

        try {
            $voterId = auth('api')->id();
            $candidateId = $request->candidate_id;
            $voted = $this->voteService->vote($voterId,$candidateId);
            return $this->apiResponse($voted,'Vote cast successfully.',201);
        }catch (\Exception $e){
            return $this->apiResponse(null,$e->getMessage(),400);
        }
    }
}
