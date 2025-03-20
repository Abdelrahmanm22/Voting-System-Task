<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\VoteService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService,VoteService $voteService)
    {
        $this->userService = $userService;
        $this->voteService = $voteService;
    }
    public function index()
    {
        $usersWithVotes = $this->voteService->getUsersWithVoteCounts();
        return view('index')->with('title','Home')->with('usersWithVotes',$usersWithVotes);
    }
    public function users()
    {
        $users = $this->userService->getAllNonAdminUsers();
        return view('admin.index')->with('title','Users')->with('users', $users);
    }
    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $validStatuses = ['pending', 'approved', 'banned'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status');
        }
        try {
            $this->userService->updateUserStatus($id, $status);
            return redirect()->back()->with('success', 'User status updated successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Failed to update user status');
        }
    }
}
