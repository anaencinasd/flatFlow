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
use App\Http\Controllers\Group_userController;






// Route::put('api/user/{user}', 'UserController@update');
// Route::put('api/task/{task}', 'TaskController@update');
// Route::put('api/balance/{balance}', 'BalanceController@update');
// Route::put('api/expense/{expense}', 'ExpenseController@update');
// Route::put('api/forum/{forum}', 'ForumController@update');
// Route::put('api/group/{group}', 'GroupController@update');
// Route::put('api/status/{status}', 'StatusController@update');

// Route::delete('api/user/{user}', 'UserController@update');
// Route::delete('api/task/{task}', 'TaskController@destroy');
// Route::delete('api/balance/{balance}', 'BalanceController@destroy');
// Route::delete('api/expense/{expense}', 'ExpenseController@destroy');
// Route::delete('api/forum/{forum}', 'ForumController@destroy');
// Route::delete('api/group/{group}', 'GroupController@destroy');
// Route::delete('api/status/{status}', 'StatusController@destroy');


//User routes

Route::post('/user', [UserController::class, 'store']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Group_user routes

Route::post('/addusertogroup', [Group_userController::class, 'addUserToGroup'])->name('addUserToGroup');
Route::post('/removeuserfromgroup', [Group_userController::class, 'removeUserFromGroup'])->name('removeUserFromGroup');







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/getuser', [UserController::class, 'getAuthenticatedUser']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::get('/task/alltasks', [TaskController::class, 'indexTasks']);

    Route::resource('/task', TaskController::class);
Route::resource('/balance', BalanceController::class);
Route::resource('/expense', ExpenseController::class);
Route::resource('/forum', ForumController::class);
Route::resource('/group', GroupController::class);
Route::resource('/status', StatusController::class);

Route::get('/getgroups', [Group_userController::class, 'getGroupsForUser'])->name('getGroupsForUser');
       
});









