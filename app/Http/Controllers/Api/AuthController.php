<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use App\Traits\ApiResponseTrait;
use App\Traits\AttachmentTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait,AttachmentTrait;
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginRequest $request)
    {
        if (!$token = auth()->guard('api')->attempt($request->validated())) {
            return  $this->apiResponse(null, 'Unauthorized', 401);
        }
        return $this->createNewToken($token);
    }

    public function register(RegisterRequest $request){
        try {
            $user = $this->userService->registerUser($request->validated());
            return $this->apiResponse($user,'User registered successfully with pending status.',201);
        }catch (\Exception $e){
            return $this->apiResponse(null,$e->getMessage(),500);
        }
    }
    public function logout()
    {
        auth('api')->logout();
        return $this->apiResponse(null,'User successfully signed out',200);
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth('api')->user()
        ]);
    }
}
