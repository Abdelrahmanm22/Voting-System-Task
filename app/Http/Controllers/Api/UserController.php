<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponseTrait;
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //this function get all approved users exclude the authenticated user
    public function index()
    {
        $users = $this->userService->getApprovedUsers();
        return $this->apiResponse($users,"Get Approved Users successfully",200);
    }
}
