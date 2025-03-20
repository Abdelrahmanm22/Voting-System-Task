<?php

namespace App\Http\Controllers\Web\front;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\VoteService;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    protected $userService;
    protected $voteService;

    public function __construct(UserService $userService, VoteService $voteService)
    {
        $this->userService = $userService;
        $this->voteService = $voteService;
    }
    public function index()
    {
        // Get paginated approved users
        $candidates = $this->userService->getApprovedUsers();

        return view('front.index')->with(['candidates' => $candidates]);
    }
    public function vote(Request $request,$candidateId)
    {
        try {
            $voterId = auth()->id();
            $this->voteService->vote($voterId, $candidateId);
            return redirect()->route('vote.index')
                ->with('success', 'Your vote has been successfully recorded!');
        }catch (\Exception $e){
            return redirect()->route('vote.index')
                ->with('error', $e->getMessage());
        }
    }
}
