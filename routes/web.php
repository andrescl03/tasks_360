<?php

use App\Http\Controllers\TaskController;
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


/*GENERACIÓN DE RUTAS*/
/*DANILO ANDRÉS CARRIÓN LAVA*/
Route::get('/', [TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class,'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class,'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class,'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class,'destroy'])->name('tasks.destroy');