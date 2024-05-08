<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobsMonitorController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('codes')->as('codes.')->group(function () {
    Route::get('/index/{group}' , [CodeController::class , 'index'])->name('index');
    Route::get('/create' , [CodeController::class , 'create'])->name('create');
    Route::post('/store' , [CodeController::class , 'store'])->name('store');
    Route::get('/groupes' , [CodeController::class , 'groupes'])->name('groupes');
    Route::post('/download/{group}' , [CodeController::class , 'download'])->name('download');
});
Route::prefix('jobs')->as('jobs.')->group(function () {
    Route::get('/' , JobsMonitorController::class)->name('index');
});
