<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = JobListing::with('employer')->latest()->paginate(3);

    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs/create');
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    JobListing::create(
        [
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]
    );

    return redirect(('/jobs'));
});

Route::get('/jobs/{id}', function ($id) {

    $job = JobListing::find($id);

    return view('jobs/show', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
