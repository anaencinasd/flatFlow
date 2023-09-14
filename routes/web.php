<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/task', [TaskController::class, 'index'])->name('task.index');



