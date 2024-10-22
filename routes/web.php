<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');