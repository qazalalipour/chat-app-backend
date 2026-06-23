<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }
    public function register(RegisterRequest $request): JsonResponse
    {
        return response()->json(
            $this->authService->register($request->validated()),
            201
        );
    }
    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json(
            $this->authService->login($request->validated())
        );
    }
    public function logout(): JsonResponse
    {
        $this->authService->logout(Auth::user());
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
    public function me()
    {
        return new UserResource(Auth::user());
    }
}
