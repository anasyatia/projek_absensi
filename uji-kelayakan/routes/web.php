<?php

use App\Http\Controllers\LateController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvi   der and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/error-permission', function () {
    return view('404');
});

Route::middleware('IsLogin')->group(function () {

    Route::get('/logout', [Controller::class, 'logout'])->name('auth-logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::middleware('IsAdmin')->group(function () {
        // penggunaan prefix digunakan untuk mempermudah menu yang memi9liki banyak fitur
        // untuk mengelompokkan route-route
        Route::prefix('/student')->name('student.')->group(function () {
            Route::get('/data', [StudentController::class, 'index'])->name('data');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
            Route::get('/{id}', [StudentController::class, 'show'])->name('show');
        });

        Route::prefix('/rombel')->name('rombel.')->group(function () {
            Route::get('/data', [RombelController::class, 'index'])->name('data');
            Route::get('/create', [RombelController::class, 'create'])->name('create');
            Route::post('/store', [RombelController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RombelController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [RombelController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [RombelController::class, 'destroy'])->name('delete');
            Route::get('/{id}', [RombelController::class, 'show'])->name('show');
        });

        Route::prefix('/rayon')->name('rayon.')->group(function () {
            Route::get('/data', [RayonController::class, 'index'])->name('data');
            Route::get('/create', [RayonController::class, 'create'])->name('create');
            Route::post('/store', [RayonController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [RayonController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [RayonController::class, 'destroy'])->name('delete');
            Route::get('/{id}', [RayonController::class, 'show'])->name('show');
        });

        Route::prefix('/user')->name('user.')->group(function () {
            Route::get('/data', [Controller::class, 'index'])->name('data');
            Route::get('/create', [Controller::class, 'create'])->name('create');
            Route::post('/store', [Controller::class, 'store'])->name('store');
            Route::get('/edit/{id}', [Controller::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [Controller::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [Controller::class, 'destroy'])->name('delete');
            Route::get('/{id}', [Controller::class, 'show'])->name('show');
        });

        Route::prefix('/late')->name('late.')->group(function () {
            Route::get('/data', [LateController::class, 'index'])->name('data');
            Route::get('/create', [LateController::class, 'create'])->name('create');
            Route::post('/store', [LateController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [LateController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [LateController::class, 'destroy'])->name('delete');
            Route::get('/{id}', [LateController::class, 'show'])->name('show');
        });
    });
});