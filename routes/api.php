<?php

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CryptocurrencyController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('cryptocurrency', CryptocurrencyController::class);
    Route::post('logout', [UserController::class, 'logout']);
    Route::resource('portofolio', PortofolioController::class);
    Route::resource('transaction', TransactionController::class);
    
});


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);