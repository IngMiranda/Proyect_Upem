<?php

use App\Http\Controllers\contactoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user_externosController;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('inicio');
});

Route::get('dashboard/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    route::resource('contacto', 'App\Http\Controllers\contactoController');
    Route::put('contacto/', [contactoController::class, 'store']);
    Route::get('contacto/{fk_correo}/upemref', [contactoController::class, 'upemref'])->name('contacto.upemref');
    Route::put('contacto/{id}', [contactoController::class, 'update']);
});

Route::middleware('auth')->group(function () {
    route::resource('users', 'App\Http\Controllers\user_externosController');
    Route::get('usuarios_ext/{id}/edit', [user_externosController::class, 'edit'])->name('usuarios_ext.edit');
    Route::put('usuarios_ext/{id}', [user_externosController::class, 'update']);
    Route::delete('usuarios_ext/{id}', [user_externosController::class, 'destroy'])->name('usuarios_ext.destroy');

});

Route::get('contacto/', [contactoController::class, 'index'], function () {
})->middleware(['auth', 'verified'])->name('contacto');


// Route::get('usuarios/', [contactoController::class, 'index'], function () {
// })->middleware(['auth', 'verified'])->name('usuarios');


Route::get('usuarios_ext/', [user_externosController::class, 'index'], function () {
})->middleware(['auth', 'verified'])->name('users');


require __DIR__.'/auth.php';
