<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RatioController;
use Illuminate\Routing\RouteGroup;
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

// login and logout routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_process', [LoginController::class, 'login_process']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:view_dashboard');
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/error', [DashboardController::class, 'error_403'])->name('error_403');

    Route::group(['middleware' => ['role:Administrator']], function () {
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
    });

    Route::group(['middleware' => ['role:User']], function () {
        Route::get('/reports', [LaporanController::class, 'index'])->name('reports');
        Route::get('/reports/neraca', [LaporanController::class, 'viewNeraca'])->name('reports.neraca');
        Route::get('/reports/neraca/details/{start}/{end}/{tahun}/{kategori}', [LaporanController::class, 'showDetailNeraca'])->name('reports.neraca.detailNeraca');

        Route::get('/reports/aktivitas', [LaporanController::class, 'viewAktivitas'])->name('reports.aktivitas');
        Route::get('/reports/aktivitas/details/{start}/{end}/{tahun}/{kategori}', [LaporanController::class, 'showDetailAktivitas'])->name('reports.neraca.detailAktivitas');
        Route::get('/reports/arusKas', [LaporanController::class, 'viewArusKas'])->name('reports.arusKas');
        Route::get('/reports/arusKas/details/{start}/{tahun}', [LaporanController::class, 'showDetailArusKas'])->name('reports.neraca.detailArusKas');
        // ratio Route
        Route::resource('ratio', RatioController::class);
        Route::get('calculate', [RatioController::class, 'calculateHWES'])->name('ratio.calculate');
    });
});
