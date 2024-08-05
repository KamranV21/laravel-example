<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobListingPolicy
{
    public function edit($user, $job)
    {
        return $job->employer->user->is($user);
    }
}
