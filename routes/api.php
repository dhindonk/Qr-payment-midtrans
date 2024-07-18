<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProcessPaymentController;
use App\Http\Controllers\VerifyPaymentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('process-payment', ProcessPaymentController::class);
Route::post('verify-payment', VerifyPaymentController::class);
