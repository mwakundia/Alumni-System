<x-app-web-layout>
    @role('super-admin|admin')

    <div class="flex justify-center pt-10 gap-20">
        <div class="flex-none">
            <h1 class="text-2xl font-bold">Applied Jobs</h1>
        </div>

        <div class="mt-10 max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg">
            <div class="table w-full overflow-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b-2">Applied Job ID</th>
                            <th class="px-4 py-2 border-b-2">Job Title</th>
                            <th class="px-4 py-2 border-b-2">Number of Applications</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border-b">{{ $job['id'] }}</td> <!-- Applied Job ID -->
                                <td class="px-4 py-2 border-b">{{ $job['job_name'] }}</td> <!-- Job Title -->
                                <td class="px-4 py-2 border-b">{{ $job['applicant_count'] }}</td> <!-- Number of Applications -->
                         
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endrole
</x-app-web-layout>