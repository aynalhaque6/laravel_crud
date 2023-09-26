<?php

use App\Http\Controllers\StudentController;
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


Route::get('/', [StudentController::class, 'students'])->name('all.student');
Route::get('/add-student', [StudentController::class, 'addStudent'])->name('add.student');
Route::post('/store-student', [StudentController::class, 'storeStudent'])->name('store.student');
Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route::post('/edit-student/{id}', [StudentController::class, 'updateStudent'])->name('update.student');
Route::get('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('delete.student');
Route::get('/status-student/{id}', [StudentController::class, 'statusStudent'])->name('status.student');
