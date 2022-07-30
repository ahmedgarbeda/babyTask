<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ParentRequest;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(ParentRequest $parentRequest)
    {
            $data = $parentRequest->only('name','parent_id');
        $this->authService->addParent($data);
        return \response()->json(['message' => 'the parent has been registerd successfully']);
    }

    public function login(LoginRequest $loginRequest){
        $data = $loginRequest->only('username','remember_token');
        $token = $this->authService->login($data);
        return \response()->json(['token' => $token, 'message' => 'user loged in successfully']);
    }
}
