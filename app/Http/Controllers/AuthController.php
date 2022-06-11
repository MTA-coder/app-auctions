<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        return $this->checkAuth($data);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $created = $this->user->create($data);
        if (empty($created)) return ResponseHelper::operationFail();
        return $this->checkAuth($data);
    }

    public function checkAuth($data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();
            $user = $this->user->createToken('auctions', $user->role);
            return ResponseHelper::operationSuccess($user);
        }
        return ResponseHelper::authenticationFail();
    }
}
