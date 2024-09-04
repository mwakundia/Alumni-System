<?php
namespace App\Http\Controllers;

use App\Models\User; // Import the User model
// use App\Models\Permission;
// use App\Models\Role;
use App\Models\Job;
use App\Models\JobApplication;
// use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    // Method to display the dashboard
    public function dashboard()
    {
        // Count the total number of users
        $user = User::count();

        // Count the total number of permissions
        $permission = Permission::count();

        // Count the total number of roles
        $role = Role::count();

        // Count the total number of jobs
        $jobs = Job::count();

        // Pass the variables to the view
        return view('admin.dashboard', compact('user', 'permission', 'role', 'jobs'));
    }
}
