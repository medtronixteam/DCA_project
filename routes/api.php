<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BotController;
use App\Http\Controllers\ExchangeController;

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

Route::post('auth/login', [LoginController::class, 'login']);
Route::post('auth/register', [LoginController::class, 'register']);
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('user/invite-link', [UserController::class, 'inviteLink']);
    Route::get('user/refferals', [UserController::class, 'refferals']);
    Route::get('user/profile', [UserController::class, 'profile']);
    Route::post('user/profile/change-password', [LoginController::class, 'passwordChange']);




    Route::post('bot/create', [BotController::class, 'store']);
    Route::get('bot/lists', [BotController::class, 'lists']);


    Route::post('exchange/add', [ExchangeController::class, 'addExchange']);





});
