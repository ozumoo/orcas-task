<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Users\UserController;
use App\Http\Controllers\API\AuthController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login',    [AuthController::class, 'login'])->name('login');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/logout',    [AuthController::class, 'logout'])->name('logout');
    
    Route::get('users/seed',  [UserController::class, 'seed'])->name('seed');
    Route::get('users',       [UserController::class, 'index'])->name('users.get');
    Route::get('users/search',[UserController::class, 'search'])->name('users.search');
});
