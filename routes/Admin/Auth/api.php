<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\Auth\AuthController;


/*==******************************************==
 ==*********=Admin==Auth=routs=***************==
 ==******************************************==*/
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout' , [AuthController::class , 'logout']);
