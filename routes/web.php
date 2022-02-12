<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [IndexController::class, 'index'])->name('index');

Route::name('user.')->group(function()
{
    Route::prefix('/user')->group(function ()
    {
        Route::post('/registration',[UserController::class, 'registration'])->name('reg');
        Route::get('/{id}',[UserController::class, 'show'])->name('show');
        Route::post('/auth',[UserController::class, 'auth'])->name('auth');
        Route::delete('/{id}/delete',[UserController::class, 'delete']);
        Route::post('/logout', [UserController::class, 'logOut'])->name('logOut');
    });
});

Route::resource('/task',TaskController::class);
