<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//ROUTE RESPONSIBLE FOR LOGIN, REGISTER, LOGOUT AND OTHERS
Route::controller(userController::class)->group(function(){
   Route::view("register","user.registerForm");
   Route::post("register","register")->name('user.register');
   Route::view("login","user.loginForm");
   Route::post("login","login")->name('user.login');
});