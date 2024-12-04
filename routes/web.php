<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', App\Http\Controllers\CategoriesController::class);
Route::resource('items', App\Http\Controllers\ItemsController::class);

Route::get('/companies/delete/{id}', 
            [App\Http\Controllers\CompanyController::class, 'confirmDelete'])
            ->name('companies.confirmDelete');