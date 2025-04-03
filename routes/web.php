<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('tasks.index');
// });
Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/toggle-status', [TaskController::class, 'toggleStatus'])->name('tasks.toggle-status');