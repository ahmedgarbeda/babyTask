<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register-parent',[\App\Http\Controllers\AuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);

Route::middleware('jwt.verify')->group(function (){
    Route::get('/get-all-babies',[\App\Http\Controllers\BabyController::class,'getAllBabies']);
    Route::get('/get-my-babies',[\App\Http\Controllers\BabyController::class,'getMyBabies']);
    Route::post('/add-baby',[\App\Http\Controllers\BabyController::class,'addBaby']);
    Route::get('/get-baby/{baby_id}',[\App\Http\Controllers\BabyController::class,'getOneBaby']);
    Route::put('/edit-baby/{baby_id}',[\App\Http\Controllers\BabyController::class,'editBaby']);
    Route::delete('/delete-baby/{baby_id}',[\App\Http\Controllers\BabyController::class,'delete']);
});

Route::middleware('jwt.verify')->post('add-partener',[\App\Http\Controllers\ParentController::class,'addPartener']);
