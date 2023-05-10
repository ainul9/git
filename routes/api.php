<?php

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

Route::get('list_agent', [App\Http\Controllers\backend\APIController::class,'AgentList2']);
Route::post('/insert_task/{usersID}', [App\Http\Controllers\backend\APIController::class,'TaskInsert2']);
Route::get('/list_task/{usersID}', [App\Http\Controllers\backend\APIController::class,'TaskList2']);
