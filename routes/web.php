<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = JobListing::with('employer')->paginate(3);

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {

    $job = JobListing::find($id);

    return view('job', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
