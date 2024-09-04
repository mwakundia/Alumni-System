<?php

namespace App\Http\Controllers;

use App\Models\AlumniJobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // List all jobs
    public function index()
    {
        $jobs = AlumniJobs::all();
        return view('role-permission.jobs.index', compact('jobs'));
    }

    // Show the form for creating a new job
    public function create()
    {
        return view('role-permission.jobs.create');
    }

    // Store a new job
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string',
            'job_position' => 'required|string',
            'job_duration' => 'required|string',
            'job_type' => 'required|string',
            'job_description' => 'required|string',
            'job_qualification' => 'required|string',
            'job_location' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        AlumniJobs::create($request->all());

        return redirect('/job')->with('status', 'Job created successfully');
    }

    // Show the form for editing the specified job
    public function edit($id)
    {
        $job = AlumniJobs::findOrFail($id);
        return view('role-permission.jobs.edit', ['job' => $job]);
    }

    // Update the specified job
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title' => 'required|string',
            'job_position' => 'required|string',
            'job_duration' => 'required|string',
            'job_type' => 'required|string',
            'job_description' => 'required|string',
            'job_qualification' => 'required|string',
            'job_location' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $job = AlumniJobs::findOrFail($id);
        $job->update($request->all());

        return redirect('/job')->with('status', 'Job updated successfully');
    }

    // Delete the specified job
    public function destroy($id)
    {
        $job = AlumniJobs::findOrFail($id);
        $job->delete();
        
        return redirect('/job')->with('status', 'Job deleted successfully');
    }

    // Show the details of a single job (optional)
    public function show($id)
    {
        $job = AlumniJobs::findOrFail($id);
        return view('role-permission.jobs.show', ['job' => $job]);
    }
}
