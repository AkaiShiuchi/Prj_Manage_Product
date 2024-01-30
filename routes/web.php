<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [RegistrationController::class, 'display'])->name('authentication.register');
Route::post('/handle-register', [RegistrationController::class, 'store'])->name('handle_register');