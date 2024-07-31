<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    // permissions routes
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{uuid}/delete', [PermissionController::class, 'destroy'])->name('permission-destroy');

    // roles routes
    Route::resource('roles', RoleController::class);
    Route::get('roles/{uuid}/delete', [RoleController::class, 'destroy'])->name('role-destroy');
    Route::get('roles/{uuid}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{uuid}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    // users routes
    Route::resource('users', UserController::class);
    Route::get('users/{uuid}/delete', [UserController::class, 'destroy'])->name('user-destroy');


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});


// login and logout routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_process', [LoginController::class, 'login_process']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
