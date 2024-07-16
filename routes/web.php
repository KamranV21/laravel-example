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

Route::get('/jobs/{id}/edit', function ($id) {

    $job = JobListing::find($id);

    return view('jobs/edit', [
        'job' => $job
    ]);
});

Route::put('/jobs/{id}', function ($id) {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job =  JobListing::findOrFail($id);

    $job->update(
        [
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]
    );

    return redirect(('/jobs/' . $job->id));
});

Route::delete('/jobs/{id}', function ($id) {

    $job = JobListing::findOrFail($id);
    $job->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
