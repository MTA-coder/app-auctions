<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::put('profile/update', [AuthController::class, 'profile']);
Route::post('address/update', [AuthController::class, 'address']);
