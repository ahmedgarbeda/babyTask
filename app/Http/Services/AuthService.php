<?php

namespace App\Http\Services;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use function PHPUnit\Framework\throwException;

class AuthService
{
    public function addParent($data)
    {
        try {
            return User::create($data);
        }catch (\Exception $e){
            return throwException($e);
        }
    }

    public function login($data)
    {
        $parentService = new ParentService();
        $parent = $parentService->getParentByNameOrId($data['username']);
        $token = JWTAuth::fromUser($parent);
        return $token;
    }
}
