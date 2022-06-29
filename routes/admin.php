<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::post('category/create', [CategoryController::class, 'create']);
Route::post('tag/create', [TagController::class, 'create']);
