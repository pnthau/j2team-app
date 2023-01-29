<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

Route::prefix('course')->controller(CourseController::class)->name('course.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{course}', 'edit')->name('edit');
    Route::post('/create', 'store')->name('store');
    Route::delete('/destroy/{course}', 'destroy')->name('destroy');
    Route::put('/edit/{course}', 'update')->name('update');
    Route::get('/api', 'api')->name('api');
    Route::get('/api/name', 'apiName')->name('apiName');
});
Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{student}', 'edit')->name('edit');
    Route::post('/create', 'store')->name('store');
    Route::delete('/destroy/{student}', 'destroy')->name('destroy');
    Route::put('/edit/{student}', 'update')->name('update');
    Route::get('/api', 'api')->name('api');

});

Route::get('/', function () {
    return view('layouts.master');
});

// Route::get('/', [StudentController::class, 'index'])->name('home.app');
// Route::get('/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/create', [StudentController::class, 'store'])->name('students.store');
