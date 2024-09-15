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
        $userId = Auth::id();
        $portfolios = Portfolio::where('user_id', $userId)->get();

        // Set the timezone to a specific country, e.g., Africa/Nairobi
        $timezone = 'Africa/Nairobi';
        $datetime = new DateTime('now', new DateTimeZone($timezone));
        $currentTime = $datetime->format('H:i:s');

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
            'cv' => 'nullable|file|mimes:pdf,doc,docx',
            'description' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        $cvPath = $request->hasFile('cv') ? $request->file('cv')->store('cvs', 'public') : $portfolio->cv;
        $certPath = $request->hasFile('certificates') ? $request->file('certificates')->store('certificates', 'public') : $portfolio->certificates;
        $profilePicturePath = $request->hasFile('profile_picture') ? $request->file('profile_picture')->store('profile_pictures', 'public') : $portfolio->profile_picture;

        $portfolio->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'education' => $request->education,
            'certificates' => $certPath,
            'cv' => $cvPath,
            'description' => $request->description,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('portfolio.index')->with('status', 'Portfolio updated successfully');
    }


    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|string',
                'dob' => 'required|date',
                'education' => 'required|string|max:255',
                'certificates' => 'nullable|file|mimes:pdf,doc,docx',
                'cv' => 'nullable|file|mimes:pdf,doc,docx',
                'description' => 'nullable|string', // Changed to nullable
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            // Handle file uploads
            $cvPath = $request->hasFile('cv') ? $request->file('cv')->store('cvs', 'public') : null;
            $certPath = $request->hasFile('certificates') ? $request->file('certificates')->store('certificates', 'public') : null;
            $profilePicturePath = $request->hasFile('profile_picture') ? $request->file('profile_picture')->store('profile_pictures', 'public') : null;
    
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($request->password)
            ]);
    
            // Create or update portfolio
            $portfolio = Portfolio::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'first_name' => $validatedData['first_name'],
                    'last_name' => $validatedData['last_name'],
                    'gender' => $validatedData['gender'],
                    'email' => $user->email,
                    'dob' => $validatedData['dob'],
                    'education' => $validatedData['education'],
                    'certificates' => $certPath,
                    'cv' => $cvPath,
                    'description' => $validatedData['description'] ?? '', // Use empty string if null
                    'profile_picture' => $profilePicturePath,
                ]
            );
    
            return redirect()->route('portfolio.index')->with('success', 'Portfolio created/updated successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Portfolio creation failed: ' . $e->getMessage());
            
            // Redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Failed to create portfolio: ' . $e->getMessage());
        }
    }
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('status', 'Portfolio deleted successfully');
    }


}