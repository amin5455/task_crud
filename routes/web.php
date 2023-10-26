<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/employe", EmployeController::class);
Route::resource('products',ProductAjaxController::class);

Route::get('vanceleather', [UserController::class, 'index'])->name('products.import.index');
Route::post('importCSV', [UserController::class, 'store'])->name('products.import.store');
Route::get('file-upload', [FileController::class, 'index']);
Route::post('file-upload', [FileController::class, 'store'])->name('file.store');
Route::get('file-upload/{id}', [FileController::class, 'destroy']);
Route::get('file-upload/{id}/edit', [FileController::class, 'edit']);
Route::post('file-upload/file', [FileController::class, 'edit_file'])->name('file.file_edit');

