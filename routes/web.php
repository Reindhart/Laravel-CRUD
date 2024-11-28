<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        $clientes = DB::select('SELECT * FROM clientes');

        return view('dashboard', ['clientes' => $clientes]);
    })->name('dashboard');
    Route::post('/iClientes', [ClienteController::class, 'store']);
    Route::put('/uCliente', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/dCliente', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::resource('clientes', ClienteController::class);
});
