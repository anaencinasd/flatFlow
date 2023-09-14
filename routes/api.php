<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//      return $request->user();
//  });

// Route::put('api/user/{user}', 'App\Http\Controllers\UserController@update');
// Route::put('api/task/{task}', 'TaskController@update');
// Route::put('api/balance/{balance}', 'BalanceController@update');
// Route::put('api/expense/{expense}', 'ExpenseController@update');
// Route::put('api/forum/{forum}', 'ForumController@update');
// Route::put('api/group/{group}', 'GroupController@update');
// Route::put('api/status/{status}', 'StatusController@update');

// Route::delete('api/user/{user}', 'App\Http\Controllers\UserController@update');
// Route::delete('api/task/{task}', 'TaskController@destroy');
// Route::delete('api/balance/{balance}', 'BalanceController@destroy');
// Route::delete('api/expense/{expense}', 'ExpenseController@destroy');
// Route::delete('api/forum/{forum}', 'ForumController@destroy');
// Route::delete('api/group/{group}', 'GroupController@destroy');
// Route::delete('api/status/{status}', 'StatusController@destroy');


Route::resource('/user', UserController::class);
Route::resource('/task', TaskController::class);
Route::resource('/balance', BalanceController::class);
Route::resource('/expense', ExpenseController::class);
Route::resource('/forum', ForumController::class);
Route::resource('/group', GroupController::class);
Route::resource('/status', StatusController::class);



