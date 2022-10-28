<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('auth.login');
});

/*
//1era forma
Route::get('/empleado', function () {return view('empleado.index');
});
//2da forma
Route::get('empleado/create',[EmpleadoController::class,'create']);
*/
//3era forma - crea todas las rutas - solo se hace cuando ya este terminado el proyecto
//crear todas las rutas de empleado controller
Route::resource('empleado',EmpleadoController::class)->middleware('auth'); 
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function(){    
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
