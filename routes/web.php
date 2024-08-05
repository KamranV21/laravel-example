<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/jobs', [JobListingController::class, 'index']);
Route::get('/jobs/create', [JobListingController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobListingController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobListingController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}', [JobListingController::class, 'update'])->middleware('auth')->can('edit', 'job');
Route::delete('/jobs/{job}', [JobListingController::class, 'destroy'])->middleware('auth')->can('edit', 'job');


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Route::controller(JobListingController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::put('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
