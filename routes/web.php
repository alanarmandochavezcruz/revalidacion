<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UabjoCarreraController;
use App\Http\Controllers\UabjoMateriaController;
use App\Http\Controllers\UabjoOptativaController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\OptativaController;
use App\Http\Controllers\AlumnoController;



use App\Http\Controllers\DictamenRegistroController;
use App\Http\Controllers\RevalidacionRegistroController;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});



Route::get('uabjo_carreras/registros', [UabjoCarreraController::class, 'registros']);
Route::resource('uabjo_carreras', UabjoCarreraController::class);


Route::get('uabjo_materias/registros', [UabjoMateriaController::class, 'registros']);
Route::get('uabjo_materias/{id_uabjo_carrera}', [UabjoMateriaController::class, 'index'])->name('uabjo_materias.index');
Route::get('uabjo_materias/{id_uabjo_carrera}/create', [UabjoMateriaController::class, 'create'])->name('uabjo_materias.create');

Route::post('uabjo_materias/{id_uabjo_carrera}/store', [UabjoMateriaController::class, 'store'])->name('uabjo_materias.store');
Route::get('uabjo_materias/{id_uabjo_carrera}/{uabjo_materia}/edit', [UabjoMateriaController::class, 'edit'])->name('uabjo_materias.edit');
Route::post('uabjo_materias/{id_uabjo_carrera}/{uabjo_materia}/update', [UabjoMateriaController::class, 'update'])->name('uabjo_materias.update');
Route::delete('uabjo_materias/{id_uabjo_carrera}/{uabjo_materia}/destroy', [UabjoMateriaController::class, 'destroy'])->name('uabjo_materias.destroy');

Route::get('uabjo_materias/{id_uabjo_carrera}/{uabjo_materia}/show', [UabjoMateriaController::class, 'show'])->name('uabjo_materias.show');

Route::resource('uabjo_materias', UabjoMateriaController::class)->except(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);

















Route::get('uabjo_optativas/{id_uabjo_carrera}', [UabjoOptativaController::class, 'index'])->name('uabjo_optativas.index');
Route::get('uabjo_optativas/{id_uabjo_carrera}/create', [UabjoOptativaController::class, 'create'])->name('uabjo_optativas.create');
Route::get('uabjo_optativas/{uabjo_optativa}/{id_uabjo_carrera}/edit', [UabjoOptativaController::class, 'edit'])->name('uabjo_optativas.edit');
Route::get('uabjo_optativas/{uabjo_optativa}/{id_uabjo_carrera}/show', [UabjoOptativaController::class, 'show'])->name('uabjo_optativas.show');
Route::post('uabjo_optativas/{id_uabjo_carrera}/store', [UabjoOptativaController::class, 'store'])->name('uabjo_optativas.store');
Route::put('uabjo_optativas/{uabjo_optativa}/{id_uabjo_carrera}/update', [UabjoOptativaController::class, 'update'])->name('uabjo_optativas.update');
Route::delete('uabjo_optativas/{uabjo_optativa}/{id_uabjo_carrera}/destroy', [UabjoOptativaController::class, 'destroy'])->name('uabjo_optativas.destroy');



















/* 
----------------------------------------------------------------------------------
---------                         UNIVERSIDADES                          ---------
----------------------------------------------------------------------------------
*/

Route::resource('universidades', UniversidadController::class)->parameters(['universidades'=>'universidad'])->middleware('auth');

/* 
----------------------------------------------------------------------------------
----------------------------------------------------------------------------------
---------------------------------------------------------------------------------- */





/* 
----------------------------------------------------------------------------------
---------                           CARRERAS                             ---------
----------------------------------------------------------------------------------
*/

Route::controller(CarreraController::class)->group(function(){
    Route::get('carreras/{id_universidad}', 'index')->name('carreras.index');
    Route::get('carreras/{id_universidad}/create', 'create')->name('carreras.create');
    Route::get('carreras/{carrera}/{id_universidad}/edit', 'edit')->name('carreras.edit');
    Route::get('carreras/{carrera}/{id_universidad}/show', 'show')->name('carreras.show');

    Route::post('carreras/{id_universidad}', 'store')->name('carreras.store');
    Route::put('carreras/{carrera}/{id_universidad}', 'update')->name('carreras.update');
    Route::delete('carreras/{carrera}/{id_universidad}', 'destroy')->name('carreras.destroy');
});

/* 
----------------------------------------------------------------------------------
----------------------------------------------------------------------------------
---------------------------------------------------------------------------------- */












































Route::controller(MateriaController::class)->group(function(){
    Route::get('materias/{id_universidad}/{id_carrera}', 'index')->name('materias.index');
    Route::get('materias/{id_universidad}/{id_carrera}/create', 'create')->name('materias.create');
    Route::get('materias/{materia}/{id_universidad}/{id_carrera}/edit', 'edit')->name('materias.edit');
    Route::get('materias/{materia}/{id_universidad}/{id_carrera}/show', 'show')->name('materias.show');

    Route::post('materias/{id_universidad}/{id_carrera}', 'store')->name('materias.store');
    Route::put('materias/{materia}/{id_universidad}/{id_carrera}', 'update')->name('materias.update');
    Route::delete('materias/{materia}/{id_universidad}/{id_carrera}', 'destroy')->name('materias.destroy');
});









Route::controller(OptativaController::class)->group(function(){
    Route::get('optativas/{id_universidad}/{id_carrera}', 'index')->name('optativas.index');
    Route::get('optativas/{id_universidad}/{id_carrera}/create', 'create')->name('optativas.create');
    Route::get('optativas/{optativa}/{id_universidad}/{id_carrera}/edit', 'edit')->name('optativas.edit');
    Route::get('optativas/{optativa}/{id_universidad}/{id_carrera}/show', 'show')->name('optativas.show');

    Route::post('optativas/{id_universidad}/{id_carrera}', 'store')->name('optativas.store');
    Route::put('optativas/{optativa}/{id_universidad}/{id_carrera}', 'update')->name('optativas.update');
    Route::delete('optativas/{optativa}/{id_universidad}/{id_carrera}', 'destroy')->name('optativas.destroy');
});

















Route::controller(AlumnoController::class)->group(function(){
    Route::get('alumnos', 'index')->name('alumnos.index');
    Route::get('alumnos/registros/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}', 'registros')->name('alumnos.registros');
    Route::get('alumnos/universidad_carrera/{id_universidad}', 'universidad_carrera')->name('alumnos.universidad_carrera');
    Route::get('alumnos/uabjo_carrera', 'uabjo_carrera')->name('alumnos.uabjo_carrera');
    Route::get('alumnos/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}/create', 'create')->name('alumnos.create');
    Route::post('alumnos/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}', 'store')->name('alumnos.store');


    Route::get('alumnos/{alumno}/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}/edit', 'edit')->name('alumnos.edit');



    Route::get('alumnos/{alumno}/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}/show', 'show')->name('alumnos.show');
    Route::put('alumnos/{alumno}/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}', 'update')->name('alumnos.update');





    Route::delete('alumnos/{alumno}/{id_uabjo_carrera}/{id_universidad}/{id_universidad_carrera}', 'destroy')->name('alumnos.destroy');
});













//--------------------------------------------------------------------------------------------------------
// Predictamen
//--------------------------------------------------------------------------------------------------------



Route::controller(DictamenRegistroController::class)->group(function(){
    Route::get('predictamen/{id_alumno}', 'index')->name('predictamen.index');
    Route::get('predictamen/{id_alumno}/create', 'create')->name('predictamen.create');
    Route::post('predictamen/{id_alumno}', 'store')->name('predictamen.store');
    Route::get('predictamen/{dictamenRegistro}/edit', 'edit')->name('predictamen.edit');
    Route::get('predictamen/{dictamenRegistro}/show', 'show')->name('predictamen.show');
    Route::put('predictamen/{dictamenRegistro}/{id_alumno}', 'update')->name('predictamen.update');
    Route::delete('predictamen/{dictamenRegistro}', 'destroy')->name('predictamen.destroy');
});








//--------------------------------------------------------------------------------------------------------
// Revalidacion
//--------------------------------------------------------------------------------------------------------

Route::get('revalidacion/formato/{predictamen}', [RevalidacionRegistroController::class, 'formato'])->name('revalidacion.formato');

Route::get('revalidacion/{predictamen}', [RevalidacionRegistroController::class, 'index'])->name('revalidacion.index');
Route::get('revalidacion/create/{id_predictamen}/{id_uabjo_materia}', [RevalidacionRegistroController::class, 'create'])->name('revalidacion.create');

Route::post('revalidacion/store/{id_predictamen}/{id_uabjo_materia}', [RevalidacionRegistroController::class, 'store'])->name('revalidacion.store');

Route::put('revalidacion/{id_revalidacion}/{id_predictamen}/{id_uabjo_materia}', [RevalidacionRegistroController::class, 'update'])->name('revalidacion.update');

Route::resource('revalidacion', RevalidacionRegistroController::class)->except(['index', 'create', 'store', 'update'])->names('revalidacion');
