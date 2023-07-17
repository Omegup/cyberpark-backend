<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BureauxController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::get('offices', [AuthController::class,'index']);
Route::get('office/{id}', [BureauxController::class,'show']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('offices', [BureauxController::class, 'store']);
    Route::put('offices/{id}', [BureauxController::class, 'update']);
    Route::delete('offices/{id}', [BureauxController::class, 'destroy']);
});