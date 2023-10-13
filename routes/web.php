<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
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

Route::get('/', [DocumentsController::class, 'index'])->name('home');
Route::post('/auth', [DocumentsController::class, 'openDocument'])->name('auth');
Route::post('/store', [DocumentsController::class, 'store'])->name('store');

Route::get('/folders', [FolderController::class, 'index'])->name('folders');
Route::post('/folders/{id}/add', [FolderController::class, 'addFolder'])->name('addFolder');

Route::get('/folders/{id}/files', [FileController::class, 'index'])->name('files');
Route::post('/folders/{id}/files/upload', [FileController::class, 'upload'])->name('upload');
Route::get('/folders/{id}/files/download', [FileController::class, 'download'])->name('download');