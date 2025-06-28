<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth('api')->attempt($credentials))
            return response()->json(['error' => 'Unauthorized'], 401);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ], 200);
    }

    public function me()
    {
        return response()->json([
            'data' => auth('api')->user(),
        ], 200);
    }

    public function logout()
    {
        auth('api')->logout(true);
        return response()->json([
            'message' => 'User logged out successfully!',
        ], 200);
    }

    public function refresh()
    {
        return response()->json([
            'refresh_token' => auth('api')->refresh(),
        ], 200);
    }
}
