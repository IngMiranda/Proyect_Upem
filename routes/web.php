<?php

use App\Http\Controllers\contactoController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('contacto/index');
// });
route::resource('contacto','App\Http\Controllers\contactoController');
Route::resource('/', contactoController::class);
Route::get('contacto/create', [contactoController::class, 'create']);
route::post('contacto/mensaje', [contactoController::class, 'store']);
Route::get('contacto/{id_contactos}/edit', [contactoController::class, 'edit']);
route::put('contacto/{id_contactos}', [contactoController::class, 'update']);


route::resource('usuarios','App\Http\Controllers\usuarioController');
Route::resource('usuario/index', usuarioController::class);
Route::get('usuario/create', [usuarioController::class, 'create']);
route::post('usuario/mensaje', [usuarioController::class, 'store']);
Route::get('usuario/{id_usuario}/edit', [usuarioController::class, 'edit']);
route::put('usuario/{id_usuario}', [usuarioController::class, 'update']);

