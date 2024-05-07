<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\FailedJob;
use Illuminate\Http\Request;

class JobsMonitorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $jobs = Job::all();
        $failed_jobs = FailedJob::all();
        return view('jobs.index' , ['jobs' => $jobs , 'failed_jobs' => $failed_jobs]);
    }
}
