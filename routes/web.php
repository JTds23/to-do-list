<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
* I would of made a login page but it was not in scope 
* In a more scoped out project I would of wrapped the routes in a middleware auth and prefixed the routes with tasks/
*/

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/{id}', [TaskController::class, 'complete'])->name('tasks.complete');
Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');






