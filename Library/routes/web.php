<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

////////////////////////// SERVICE /////////////////////////////////////////
Route::prefix('api')->group(function () {
    Route::get('/pong', [ApiController::class, 'apiConnection']);
    Route::post('/review', [ApiController::class, 'apiConnection2']);
});

// Route::get('/pong', [ApiController::class, 'apiConnection']);
////////////////////////// USUARIO /////////////////////////////////////////
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'registerIndex'])->name('register');
Route::post('/login', [UsuarioController::class, 'createUSer'])->name('create.users');
Route::get('/home', [HomeController::class, 'homeIndex'])->name('home');
Route::get('editar/{id}', [HomeController::class, 'editUser'])->name('usuario.editar');
Route::put('editar/{id}', [HomeController::class, 'update'])->name('usuario.actualizado');
Route::delete('eliminar/{id}', [HomeController::class, 'delete'])->name('usuario.eliminar');
////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////// CATALOGO ////////////////////////////////////////////////////
Route::get('/catalogo', [CatalogoController::class, 'inicio'])->name('catalogo.inicio');
Route::get('bookregister', [CatalogoController::class, 'indexCatalogoRegister'])->name('register.libro');
Route::post('/registerbook', [CatalogoController::class, 'store'])->name('libro.crear');
Route::get('/editarcatalogo/{id}', [CatalogoController::class, 'updateCatalogo'])->name('catalogo.editar');
Route::put('/editarcatalogo/{id}', [CatalogoController::class, 'catalogoUpdate'])->name('catalogo.update');
Route::delete('/eliminar/{id}', [CatalogoController::class, 'catalogoDelete'])->name('catalogo.eliminar');
///////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////// CONFIGURACION ////////////////////////////////////////////////
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.home');
Route::post('/configuracion/rol', [ConfiguracionController::class, 'storeRol'])->name('configuracion.crearRol');
Route::post('/configuracion/cargo', [ConfiguracionController::class, 'storeCargo'])->name('configuracion.crearCargo');
Route::post('/configuracion/sucursal', [ConfiguracionController::class, 'storeSucursal'])->name('configuracion.crearSucursal');
///////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////// RESEÑAS ////////////////////////////////////////////////
Route::get('/review', [ReviewController::class, 'reviewsIndex'])->name('reviews');
///////////////////////////////////////////////////////////////////////////////////////////////
