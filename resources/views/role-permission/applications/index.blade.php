</x-app-web-layout>
@extends('layouts.app')

@section('content')

@if(isset($applications) && $applications->isNotEmpty())
    @foreach ($applications as $application)
        <div>
            <p>{{ $application->job->title }}</p>  <!-- Ensure this relationship is loaded -->
            <p>{{ $application->status }}</p>
        </div>
    @endforeach
@else
    <p>No applications found.</p>
@endif


<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-6">Your Job Applications</h1>

        @if($applications->isEmpty())
            <p class="text-gray-700">You have not applied for any jobs yet.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Job Title</th>
                        <th class="py-2 px-4 border-b text-left">Status</th>
                        <th class="py-2 px-4 border-b text-left">Applied On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $application->job->title }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium leading-5 bg-{{ $application->status == 'pending' ? 'yellow' : 'green' }}-100 text-{{ $application->status == 'pending' ? 'yellow' : 'green' }}-800">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $application->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Available Jobs Section -->
    <div class="mt-10 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Available Jobs</h2>
        @if ($jobs->isEmpty())
            <p class="text-gray-700">No jobs available.</p>
        @else
            @foreach ($jobs as $job)
                <div class="mt-6 p-4 bg-gray-100 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    <a href="{{ url('jobs/' . $job->id) }}" class="block text-gray-900 hover:text-blue-600">
                        <p class="text-lg text-blue-700 font-semibold uppercase">{{ $job->title }}</p>
                        <h5 class="mt-2 mb-4 text-xl font-bold">{{ $job->company_name }}</h5>
                        <div class="flex flex-wrap gap-4 text-gray-600">
                            <p><span class="font-semibold">Fixed Price:</span> ${{ $job->price }}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</p>
                            <p><i class="fas fa-clock"></i> {{ $job->duration }}</p>
                        </div>
                        <p class="mt-4 text-gray-700">{{ Str::limit($job->description, 100, '...') }}</p>
                        <div class="mt-4">
                            <a href="{{ url('jobs/' . $job->id) }}" class="text-blue-500 hover:underline">Read more</a>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
</x-app-web-layout>