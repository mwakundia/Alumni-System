<x-app-web-layout>
    @php
    $user = App\Models\User::count();
    $permission = Spatie\Permission\Models\Permission::count();
    $role = Spatie\Permission\Models\Role::count();
    $jobs = App\Models\AlumniJobs::count();
    @endphp
     
     @role('admin|super-admin')

     

     <div class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen py-12">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="bg-white p-10 shadow-lg rounded-lg">
                 <div class="text-center">
                     <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Welcome, <b>{{ Auth::user()->name }}</b></h1>
                     <p class="text-lg text-gray-600">Here’s a quick overview of your dashboard</p>
                 </div>
                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                     <x-stat-box color="red" :count="$user" label="Total Users" />
                     <x-stat-box color="green" :count="$permission" label="Total Permissions" />
                     <x-stat-box color="blue" :count="$role" label="Total Roles" />
                     <x-stat-box color="yellow" :count="$jobs" label="Total Jobs" />
                 </div>
                 <div class="mt-12">
                     <h2 class="text-2xl font-bold text-center mb-4">Quick Actions</h2>
                     <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                         <x-action-box title="Manage Users" color="green" link="/users" linkText="View" addLink="/users/create" addLinkText="Add User" />
                         <x-action-box title="Manage Jobs" color="blue" link="/jobs" linkText="View" addLink="/jobs/create" addLinkText="Add Job" />
                         <x-action-box title="Manage Permissions" color="purple" link="/permissions" linkText="View" addLink="/permissions/create" addLinkText="Add Permission" />
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @endrole
     
    @role('alumni')
    @if(session('status'))
    <script>
        Swal.fire({
        title: "",
        text: "Application has been Added",
        icon: "success"
        });
    </script>
    @endif
    <div class="py-12 bg-blue-50">
        <div class="max-w-7xl mx-auto bg-white p-10 shadow-lg rounded-lg">
            <!-- Job Listings Section -->
            <div class="bg-red-50 min-h-screen py-12">
                <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
                    <div class="bg-white p-10 shadow-lg rounded-lg">
                        <div class="mb-8">
                        </div>
    
                        <hr class="my-6 border-red-400">
    
                        <div class="grid grid-cols-1 gap-6">
                            @foreach (App\Models\AlumniJobs::all() as $jobs)
                            <a href="{{ url('job/' . $jobs->id . '/view') }}" class="block p-6 bg-white rounded-lg shadow-md hover:bg-red-50 transition-colors duration-300">
                                <h5 class="text-2xl font-bold text-red-900">{{ $jobs->job_title }}</h5>
                                <p class="mt-2 text-gray-700">{{ $jobs->job_description }}</p>
                                <div class="flex gap-4 mt-4 text-gray-600">
                                    <span class="flex items-center gap-1 text-red-600">
                                        <i class="fas fa-money-bill-wave"></i> {{ $jobs->job_amount }}
                                    </span>
                                    <span class="flex items-center gap-1 text-red-600">
                                        <i class="fas fa-map-marker-alt"></i> {{ $jobs->job_location }}
                                    </span>
                                    <span class="flex items-center gap-1 text-red-600">
                                        <i class="fas fa-clock"></i> {{ $jobs->job_duration }}
                                    </span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-web-layout>