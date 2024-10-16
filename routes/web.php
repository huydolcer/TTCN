<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use Faker\Core\File;

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

Route::get("/", [MenuController::class, 'index'])->name('menus.index');
Route::post("/add", [MenuController::class, 'add'])->name('menus.add');
Route::get("/update/{id}", [MenuController::class, 'showUpdateForm'])->name('menus.update.form');
Route::put("/update/{id}", [MenuController::class, 'update'])->name('menus.update');
Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/files-upload',[FileUploadController::class, 'fileUpload'])->name('file.upload');
Route::post('/files-upload',[FileUploadController::class, 'fileSave'])->name('file.save');
Route::get('/showFile',[FileUploadController::class, 'showFile'])->name('file.show');
Route::delete('/delete/{id}', [FileUploadController::class, 'destroy'])->name('files.destroy');



