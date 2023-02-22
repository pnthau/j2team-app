<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/processing-login', [AuthController::class, 'processLogin'])->name('process_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/processing-register', [AuthController::class, 'processRegister'])->name('process_register');

Route::middleware('admin')->group(function () {
    Route::prefix('course')->controller(CourseController::class)->name('course.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/api', 'api')->name('api');
        Route::get('/api/name', 'apiName')->name('apiName');
        Route::middleware('supper')->group(function () {
            Route::get('/edit/{course}', 'edit')->name('edit');
            Route::delete('/destroy/{course}', 'destroy')->name('destroy');
            Route::put('/edit/{course}', 'update')->name('update');
        });
    });
    Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/api', 'api')->name('api');
        Route::middleware('supper')->group(function () {
            Route::get('/edit/{student}', 'edit')->name('edit');
            Route::put('/edit/{student}', 'update')->name('update');
            Route::delete('/destroy/{student}', 'destroy')->name('destroy');
        });
    });

    Route::get('/', function () {
        return view('layouts.master');
    })->name('home');
});

// Route::get('/', [StudentController::class, 'index'])->name('home.app');
// Route::get('/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/create', [StudentController::class, 'store'])->name('students.store');
