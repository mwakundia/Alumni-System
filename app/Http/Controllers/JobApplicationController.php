<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\AlumniJobs;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;


class JobApplicationController extends Controller
{   
    public function dashboard()
{
    $user = User::count();
    $permission = Permission::count();
    $role = Role::count();
    $jobs = Job::all();
    return view('dashboard', compact('user', 'permission', 'role', 'jobs'));
}

    public function apply(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);

        // Check if the user has already applied for this job
        $existingApplication = JobApplication::where('alumni_id', auth()->id())
                                             ->where('job_id', $job->id)
                                             ->first();
        
        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Handle the transaction
        \DB::transaction(function () use ($job) {
            $application = new JobApplication();
            $application->alumni_id = auth()->id();
            $application->job_id = $job->id;
            $application->status = 'pending';
            $application->save();
        });

        return redirect()->back()->with('success', 'Your application has been submitted.');
    }

    public function viewApplications()
    {
        $applications = JobApplication::where('alumni_id', auth()->id())->get();
        return view('dashboard.index', compact('dashboard'));
    }

    public function showJobPage()
{
    $jobs = Job::all(); // This should return a collection of Job models
    $applications = JobApplication::where('alumni_id', auth()->id())->get(); // This should return a collection of JobApplication models

    return view('dashboard', compact('jobs', 'applications'));
  
}
    public function job()
{
    return $this->belongsTo(Job::class);
}

}