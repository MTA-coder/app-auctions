<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::controller(AuctionController::class)->group(function () {
    Route::get('auction/get', 'get');
    Route::post('auction/create', 'create');
});

Route::post('upload', [FileController::class, 'upload']);
