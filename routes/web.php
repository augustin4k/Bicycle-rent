<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UtilizacaoController;
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

Route::resource('users', UserController::class);

//Início
Route::get('/', [UserController::class, 'welcome'])->middleware('guest');
Route::get('/home', [EventController::class,'index'])->middleware('auth');
Route::get('/ajuda', [UserController::class, 'ajuda'])->middleware('auth');
Route::post('/ajuda', [UserController::class, 'ticket'])->middleware('auth');

//Reservas
Route::get('/events', [EventController::class, 'schedule'])->middleware('auth');
Route::get('/events/create', [ReservasController::class, 'create'])->middleware('auth');
Route::post('/events/escolheBicicleta',[ReservasController::class, 'escolheBicla'])->middleware('auth');
Route::post('/events/create', [ReservasController::class, 'store'])->middleware('auth');
Route::get('/events/cancelar', [ReservasController::class, 'cancelar'])->middleware('auth'); 

//Recibos
Route::get('/history', [EventController::class, 'history'])->middleware('auth');

//Perfil
Route::get('/profile', [UserController::class, 'account'])->middleware('auth');
Route::get('/profile/name-editing',[UserController::class, 'get_name_editing'])->middleware('auth');
Route::get('/profile/password-editing',[UserController::class, 'get_password_editing'])->middleware('auth');
Route::get('/profile/username-editing',[UserController::class, 'get_username_editing'])->middleware('auth');
Route::get('/profile/mudar-plano',[UserController::class, 'mudar_plano'])->middleware('auth');


//Mapas
Route::get('/home/avenidaMar', [EventController::class,'avenidaMar'])->middleware('auth');
Route::get('/home/edificio2000', [EventController::class,'edificio2000'])->middleware('auth');
Route::get('/home/avenidaMadalenas', [EventController::class,'avenidaMadalenas'])->middleware('auth');
Route::get('/home/tecnopolo', [EventController::class,'tecnopolo'])->middleware('auth');
Route::get('/home/mercado', [EventController::class,'mercado'])->middleware('auth');
Route::get('/home/forum', [EventController::class,'forum'])->middleware('auth');
Route::get('/home/madeira', [EventController::class,'madeira'])->middleware('auth');
Route::get('/home/marina', [EventController::class,'marina'])->middleware('auth');
Route::get('/home/miradouro', [EventController::class,'miradouro'])->middleware('auth');
Route::get('/home/monte', [EventController::class,'monte'])->middleware('auth');

//Utilização
Route::get('/utilizacao', [UtilizacaoController::class, 'use'])->middleware('auth');
Route::post('/utilizacao', [UtilizacaoController::class, 'startUsing'])->middleware('auth');


//EntregarBicicleta
Route::get('/entregarBicicleta', [UtilizacaoController::class, 'deliver'])->middleware('auth');
Route::post('/entregarBicicleta', [UtilizacaoController::class, 'endusing'])->middleware('auth');


require __DIR__.'/auth.php';
