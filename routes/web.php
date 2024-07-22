<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobListingController::class);

// Route::controller(JobListingController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::put('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });
