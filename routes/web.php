<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/store',[studentController::class,'store'])->name('store');
Route::get('/fetchAll',[studentController::class,'fetchAll'])->name('fetchAll');
