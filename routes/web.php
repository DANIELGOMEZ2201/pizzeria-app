<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('welcome');})->name('welcome');

//clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::put('/clients/{client}', [EventoController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}/edit', [EventoController::class, 'edit'])->name('clients.edit');