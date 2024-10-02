<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Rota para a página inicial
Route::get('/', function () {
    return view('welcome'); // Mude para a view que deseja usar como página inicial
});

// Rotas de autenticação
Auth::routes();

// Rotas para produtos
Route::middleware(['auth'])->group(function () {
    
    // Rotas para importar produtos da API
    Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
});

// Rotas para categorias
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

// Exemplo de rota para buscar produtos por categoria ou outros filtros
Route::get('products/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('products', ProductController::class)->except(['show']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/find/{id}', [ProductController::class, 'findById'])->name('products.find');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
});

