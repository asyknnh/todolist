<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos', [App\Http\Controllers\ToDoController::class, 'index'])->name('todo:index');
Route::get('todos/create', [App\Http\Controllers\ToDoController::class, 'create'])->name('todo:create');
Route::post('/todos/create', [App\Http\Controllers\ToDoController::class, 'store'])->name('todo:store');
Route::post('/todos/create/{todo}', [App\Http\Controllers\ToDoController::class, 'store'])->name('todo:task');

Route::get('/todos/{todo}', [App\Http\Controllers\ToDoController::class, 'show'])->name('todo:show');
Route::get('/todos/{todo}/myday', [App\Http\Controllers\ToDoController::class, 'show'])->name('todo:myday');
Route::get('/todos/{todo}/important', [App\Http\Controllers\ToDoController::class, 'show'])->name('todo:important');
Route::get('/todos/{todo}/planned', [App\Http\Controllers\ToDoController::class, 'show'])->name('todo:planned');

Route::post('/todos/{todo}/edit', [App\Http\Controllers\ToDoController::class, 'update'])->name('todo:update');
Route::get('/todos/edit/{task}', [App\Http\Controllers\ToDoController::class, 'edit'])->name('task:edit');
Route::post('/todos/edit/{task}', [App\Http\Controllers\ToDoController::class, 'update'])->name('task:update');
Route::post('/todos/complete/{task}', [App\Http\Controllers\ToDoController::class, 'update'])->name('task:complete');

Route::get('/todos/{todo}/delete', [App\Http\Controllers\ToDoController::class, 'delete'])->name('todo:delete');
Route::get('/todos/{task}/delete', [App\Http\Controllers\ToDoController::class, 'delete'])->name('task:delete');