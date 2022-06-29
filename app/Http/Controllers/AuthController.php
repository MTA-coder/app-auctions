<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateAddressRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user, $address;

    public function __construct(User $user, Address $address)
    {
        $this->user = $user;
        $this->address = $address;
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

    public function profile(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $result =  $this->user->update(['id' => Auth::id()], $data);
        return empty($result)
            ? ResponseHelper::operationFail()
            : ResponseHelper::update();
    }

    public function address(UpdateAddressRequest $request)
    {
        $data = $request->validated();

        if ($this->address->where('user_id', Auth::id())->exists()) $result = $this->address->update(['user_id' => Auth::id()], $data);
        else {
            $data['user_id'] = Auth::id();
            $result = $this->address->create($data);
        }

        return empty($result)
            ? ResponseHelper::operationFail()
            : ResponseHelper::operationSuccess($result);
    }

    public function checkAuth($data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();
            $user['token'] = $this->user->createToken('auctions', [$user->role]);
            return ResponseHelper::operationSuccess($user);
        }
        return ResponseHelper::authenticationFail();
    }
}
