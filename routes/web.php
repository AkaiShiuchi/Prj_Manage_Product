<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::get('/register', [RegistrationController::class, 'display'])->name('authentication.register');
Route::post('/handle-register', [RegistrationController::class, 'store'])->name('handle_register');
Route::get('/actived/{user}/{token}', [RegistrationController::class, 'actived'])->name('actived');
Route::get('/get-actived', [RegistrationController::class, 'get_actived'])->name('get_actived');
Route::post('/post-get', [RegistrationController::class, 'post_get']);

Route::get('/', [LoginController::class, 'display'])->name('authentication.login');
Route::post('/handle-login', [LoginController::class, 'handle_login']);

Route::get('/forget-password', [LoginController::class, 'forget_pass'])->name('forget_password');
Route::post('/handle-forget', [LoginController::class, 'handle_forget']);
Route::get('/get-password/{user}/{token}', [LoginController::class, 'get_pass'])->name('get_password');
Route::post('/handle-get/{user}/{token}', [LoginController::class, 'handle_get']);
