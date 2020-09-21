<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\User;

class AuthController extends Controller
{
    /**
     * @api {POST} /api/register
     * Register new user
     * @param RegisterRequest $request
     * @param User $users
     * @return AuthResource
     */
    public function register(RegisterRequest $request, User $users)
    {
        $user = $users->register($request);

        return new AuthResource($user);
    }

    /**
     * @api {POST} /api/login
     * Authenticate an user
     * @param LoginRequest $request
     * @return AuthResource
     */
    public function login(LoginRequest $request)
    {
        return new AuthResource($request->user);
    }
}
