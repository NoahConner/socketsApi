<?php

use App\Http\Controllers\dummyapi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('allusers',[dummyapi::class,'dummydata']);
Route::post('edituser',[dummyapi::class,'editdata']);
Route::post('creatUser',[dummyapi::class,'create']);
Route::post('login',[dummyapi::class,'login']);
