<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

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
    return view('welcome');
});

/*
Route::get('/empleados', function () {
    return view('empleados.index');
});



Route::get('/empleados/create', [EmpleadosController::class,'create']);

Route::get('/empleados/edit', function () {
    return view('empleados.edit');
});

Route::get('/empleados/form', function () {
    return view('empleados.form');
});*/

Route::resource('empleados', EmpleadosController::class);