<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', App\Http\Controllers\CategoriesController::class);
Route::resource('items', App\Http\Controllers\ItemsController::class);

Route::get('/categories/delete/{id}', 
            [App\Http\Controllers\CategoriesController::class, 'confirmDelete'])
            ->name('categories.confirmDelete');
/*
Route::get('/categories', 
    [App\Http\Controllers\CategoriesController::class, 'index']);
Route::get('/categories/create', 
    [App\Http\Controllers\CategoriesController::class, 'create']);
Route::post('/categories', 
    [App\Http\Controllers\CategoriesController::class, 'store']);
Route::get('/categories/{id}/edit', 
    [App\Http\Controllers\CategoriesController::class, 'edit']);
Route::patch('/categories/{id}', 
    [App\Http\Controllers\CategoriesController::class, 'update']);
Route::get('/categories/{id}', 
    [App\Http\Controllers\CategoriesController::class, 'show']);
Route::delete('/categories/{id}', 
    [App\Http\Controllers\CategoriesController::class, 'destroy']);
Route::get('/categories/delete/{id}', 
    [App\Http\Controllers\CategoriesController::class, 
        'confirmDelete']);
*/