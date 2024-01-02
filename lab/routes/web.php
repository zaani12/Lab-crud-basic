<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});
 Route::get('/',[TaskController::class,'index'])->name('index'); 
 Route::get('create', [TaskController::class, 'create'])->name('create');
Route::post('store', [TaskController::class, 'store'])->name('store');
Route::get('{task}/edit', [TaskController::class, 'edit'])->name('edit');
Route::put('{task}/update', [TaskController::class, 'update'])->name('update');
Route::delete('{task}/destroy', [TaskController::class, 'destroy'])->name('destroy');