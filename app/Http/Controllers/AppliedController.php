<?php

namespace App\Http\Controllers;

use App\Models\applied_jobs;
use App\Models\AlumniJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppliedController extends Controller
{
    public function index()
    {
        $jobs = applied_jobs::select('job_id', DB::raw('MIN(id) as id'), DB::raw('count(user_id) as applicant_count'))
            ->with('alumniJob')
            ->groupBy('job_id')
            ->get();

        $jobs = $jobs->map(function ($job) {
            return [
                'id' => $job->id,
                'job_id' => $job->job_id,
                'job_name' => $job->alumniJob->job_title,
                'applicant_count' => $job->applicant_count,
            ];
        });

        return view('role-permission.appliedjobs.index', compact('jobs'));
    }

    public function view($id)
{
    try {
        $application = applied_jobs::with(['alumniJob', 'user'])->findOrFail($id);

        $responseData = [
            'application' => $application,
            'alumniJob' => $application->alumniJob,
            'user' => $application->user,
        ];

        return view('role-permission.appliedjobs.view', $responseData);
    } catch (\Exception $e) {
        Log::error("Error viewing application: " . $e->getMessage());
        Log::error($e->getTraceAsString());
        
        return view('error.500', [
            'status' => 'error',
            'message' => 'An error occurred while retrieving the application data.',
            'error' => $e->getMessage()
        ]);
    }
}
    public function apply(Request $request, $jobId)
    {
        $userId = Auth::id();

        try {
            DB::transaction(function () use ($userId, $jobId) {
                $jobExists = AlumniJobs::where('id', $jobId)->exists();
                if (!$jobExists) {
                    throw new \Exception('Job does not exist.');
                }

                $existingApplication = applied_jobs::where('user_id', $userId)
                    ->where('job_id', $jobId)
                    ->lockForUpdate()
                    ->first();

                if ($existingApplication) {
                    throw new \Exception('You have already applied for this job.');
                }

                applied_jobs::create([
                    'user_id' => $userId,
                    'job_id' => $jobId,
                    'status' => 'pending',
                ]);
            });

            return redirect()->back()->with('status', 'Job application submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function approve($id)
{
    $application = applied_jobs::findOrFail($id);
    $application->status = 'approved';
    $application->save();
    
    return redirect()->route('applications.index')
        ->with('toast_message', 'Job application approved successfully!')
        ->with('toast_type', 'success');
}

public function deny($id)
{
    $application = applied_jobs::findOrFail($id);
    $application->status = 'denied';
    $application->save();
    
    return redirect()->route('applications.index')
        ->with('toast_message', 'Job application denied successfully!')
        ->with('toast_type', 'error');
}

public function pending($id)
{
    $application = applied_jobs::findOrFail($id);
    $application->status = 'pending';
    $application->save();
    
    return redirect()->route('applications.index')
        ->with('toast_message', 'Job application marked as pending.')
        ->with('toast_type', 'info');
}
}