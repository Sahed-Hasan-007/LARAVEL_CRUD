<?php

use App\Http\Controllers\crudController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::get('crud/index',[crudController::class, 'index'])->name('crud.index');
Route::get('crud/create',[crudController::class, 'create'])->name('crud.create');
Route::post('crud/index',[crudController::class, 'store'])->name('crud.store');
Route::get('crud/edit/{id}',[crudController::class, 'edit'])->name('crud.edit');
Route::put('crud/update/{id}',[crudController::class, 'update'])->name('crud.update');
Route::get('crud/delete/{id}',[crudController::class, 'destroy'])->name('crud.delete');




require __DIR__.'/auth.php';
