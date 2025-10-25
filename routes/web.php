<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;

// မလိုတဲ့ route တွေပိတ်မယ်
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [OrderController::class, 'index'])->name('home');
Route::resource('dish', DishesController::class);
