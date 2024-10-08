<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/store',[studentController::class,'store'])->name('store');
Route::get('/fetchAll',[studentController::class,'fetchAll'])->name('fetchAll');
Route::get('/edit',[studentController::class,'edit'])->name('edit');
Route::post('/update',[studentController::class,'update'])->name('update');
Route::post('/delete',[studentController::class,'delete'])->name('delete');
