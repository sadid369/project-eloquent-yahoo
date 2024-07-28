<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





Route::resource('/user', UserController::class);
Route::resource('/stu', StudentController::class);