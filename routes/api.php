<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function ($router) {
    Route::post('users', [UserController::class, 'store']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
    Route::post('admin/logout', [AuthController::class, 'logout']);
    Route::post('admin/refresh', [AuthController::class, 'refresh']);
    Route::post('admin/blog', [BlogController::class, 'store']);
    Route::get('admin/blog',[BlogController::class,'index']);
});
Route::post('admin/login', [AuthController::class, 'login']);

Route::get('test', function () {
    return response()->json([
        'data' => 'test'
    ]);
});
