<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\alumni_jobs;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PortfolioController extends Controller
{
    public function index()
    {
        // Set the timezone to a specific country, e.g., Africa/Nairobi
        $timezone = 'Africa/Nairobi';
        $datetime = new DateTime('now', new DateTimeZone($timezone));
        $currentTime = $datetime->format('H:i:s');

        $portfolios = Portfolio::where('user_id', Auth::id())->get();
        return view('role-permission.portfolio.index', [
            'portfolios' => $portfolios,
            'currentTime' => $currentTime,
        ]);
    }

    public function show(Portfolio $portfolio)
    {
        return view('role-permission.portfolio.show', compact('portfolio'));
    }

    public function create()
    {
        return view('role-permission.portfolio.create');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('role-permission.portfolio.edit', [
            'portfolio' => $portfolio
        ]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'education' => 'required|string|max:255',
            'certificates' => 'nullable|file|mimes:pdf,doc,docx',
            'skills' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'description' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle CV file
        $cvPath = $portfolio->cv;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        // Handle Certificates file
        $certPath = $portfolio->certificates;
        if ($request->hasFile('certificates')) {
            $certPath = $request->file('certificates')->store('certificates', 'public');
        }

        // Handle Profile Picture file
        $profilePicturePath = $portfolio->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

       $portfolio->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'education' => $request->education,
            'certificates' => $certPath,
            'skills' => $request->skills,
            'cv' => $cvPath,
            'description' => $request->description,
            'profile_picture' => $profilePicturePath,
        ]);

        return ($result);
    }

    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'gender' => 'string',
        'dob' => 'date',
        'education' => 'string|max:255',
        'certificates' => 'nullable|file|mimes:pdf,doc,docx',
        'skills' => 'nullable|string',
        'cv' => 'required|nullable|file|mimes:pdf,doc,docx',
        'description' => 'required|string',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'string|min:3',
       
    ]); 

    // Handle CV file
    if ($request->hasFile('cv')) {
        $cvPath = $request->file('cv')->store('cvs', 'public');
    } else {
        $cvPath = null;
    }

    // Handle Certificates file
    if ($request->hasFile('certificates')) {
        $certPath = $request->file('certificates')->store('certificates', 'public');
    } else {
        $certPath = null;
    }

    // Handle Profile Picture file
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
    } else {
        $profilePicturePath = null;
    }

    $email = Auth::user()->email;

    // Create or update portfolio
    $portfolio = Portfolio::updateOrCreate(
        ['user_id' => Auth::id()],
        [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $email,
            'dob' => $request->dob,
            'education' => $request->education,
            'certificates' => $certPath,
            'skills' => $request->skills,
            'cv' => $cvPath,
            'description' => $request->description,
            'profile_picture' => $profilePicturePath,   
        ]
    );

    if ($request->has('password')) {
        $portfolio->update(['password' => bcrypt($request->password)]);
    }   
    

    // Fetch projects for the logged-in user
   
    return redirect('/portfolio');

}

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('status', 'Portfolio deleted successfully');
    }
}
