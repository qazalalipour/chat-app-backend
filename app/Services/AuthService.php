<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(private readonly UserRepositoryInterface $userRepo)
    {
    }
    public function register(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepo->create($data);
        $token = $user->createToken('auth_token')->plainTextToken;
        return compact('user', 'token');
    }
    public function login(array $data): array
    {
        if (!Auth::attempt($data)) {
            throw new AuthenticationException('Invalid login credentials.');
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return compact('user', 'token');
    }
    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }
}
