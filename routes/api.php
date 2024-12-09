<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});



// Route::post('/check-deposit', [TransactionController::class, 'checkDeposit']);

// Route::post('/check-deposit', [TransactionController::class, 'checkDeposit']);
// Route::post('/check-deposit', [TransactionController::class, 'checkDeposit']); 
