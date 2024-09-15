<?php
use App\Models\User;
use App\Models\AlumniJobs;
use App\Models\applied_jobs;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AppliedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JobApplicationController;

Route::get('/test', function() {
    dd('Test route is working!');
});


// Permission Routes
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');
Route::resource('permissions', PermissionController::class);
Route::resource('/applicants', AppliedController::class);
// Job Routes
Route::get('job/{jobId}/delete', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('job/{jobId}/view', [JobController::class, 'show'])->name('jobs.view');
Route::resource('job', JobController::class);
Route::post('/job/{id}/apply', [JobController::class, 'apply'])->name('job.apply');
// Applied Jobs Routes
Route::middleware(['auth', 'role:super-admin|admin'])->group(function () {
    Route::get('/applied-jobs', [AppliedController::class, 'index'])->name('applications.index');
    Route::get('/applied-jobs/{id}', [AppliedController::class, 'view'])->name('applications.view');
    Route::post('/applied-jobs/{id}/approve', [AppliedController::class, 'approve'])->name('applications.approve');
    Route::post('/applied-jobs/{id}/deny', [AppliedController::class, 'deny'])->name('applications.deny');
    Route::post('/applied-jobs/{id}/pending', [AppliedController::class, 'pending'])->name('applications.pending');
});
// User Routes
Route::get('users/{userId}/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::resource('users', UserController::class);

// Portfolio Routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::resource('portfolio', PortfolioController::class);




Route::post('apply/{id}', function (Request $request, $id) {
    // 
    $user = Auth::user()->id;
    // Redirect or return a response
     applied_jobs::create([
       'user_id' =>  $user,
       'job_id' => $id,
       'fname' => $request->input('fname'),
       'status' => $request->input('user_info'), 
        
       

        ]);;
        return redirect('/dashboard')->with('status', 'Application Success');
});

// Role Routes  
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissions');
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissions');
Route::resource('roles', RoleController::class);

// Dashboard Route
Route::get('/dashboard', function () {
    $jobs = AlumniJobs::all();
    $userCount = User::count();
    $permissionCount = Permission::count();
    $jobCount = AlumniJobs::count();
    $roleCount = Role::count(); 

    return view('dashboard', [
        'user' => $userCount,
        'permission' => $permissionCount,
        'role' => $roleCount,
        'jobs' => $jobs,
        'job' => $jobCount,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
Route::get('/', function () {
    return view('auth.login');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to home or any other route after logout
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Job Application Routes
Route::get('/jobs', [JobApplicationController::class, 'showJobPage'])->name('jobs.list');
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');


require __DIR__.'/auth.php';