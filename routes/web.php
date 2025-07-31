<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/buku',[BukuController::class,'index'])->name('index.buku');
Route::get('/edit/{id}/buku',[BukuController::class,'edit'])->name('edit.buku');
Route::get('/create/buku',[BukuController::class,'create'])->name('create.buku');
Route::post('/store/buku',[BukuController::class,'store'])->name('store.buku');
Route::patch('/update/{id}/buku',[BukuController::class,'update'])->name('update.buku');
Route::delete('/delete/{id}/buku',[BukuController::class,'destroy'])->name('destroy.buku');

