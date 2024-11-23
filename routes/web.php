<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;

Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::resource('pizzas', PizzaController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('suppliers', SupplierController::class);
});



Route::get('/', function () {return view('welcome');})->name('welcome');

//clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

//Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

//Employees
Route::get('/employees', [EmployeController::class, 'index'])->name('employees.index');

// Rutas para pedidos
Route::resource('orders', OrderController::class);

// Rutas para pizzas
Route::resource('pizzas', PizzaController::class);

// Rutas para inventario (materias primas)
Route::resource('inventory', InventoryController::class);

// Rutas para proveedores
Route::resource('suppliers', SupplierController::class);


