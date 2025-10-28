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
    dd('this is root path');
    return view('welcome');
});

Route::get('/', [OrderController::class, 'index'])->name('order.form');
Route::post('order_submit', [OrderController::class, 'submit'])->name('order.submit');

// Route::get('/home', [OrderController::class, 'index'])->name('home');
Route::resource('dish', DishesController::class);
Route::get('order', [DishesController::class, 'order'])->name('kitchen.order');
Route::get('order/{order}/approve', [DishesController::class, 'approve']);
Route::get('order/{order}/cancel', [DishesController::class, 'cancel']);
Route::get('order/{order}/ready', [DishesController::class, 'ready']);

Route::get('order/{order}/serve', [OrderController::class, 'serve']);