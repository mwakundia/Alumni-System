@role('alumni')
<x-partials.alumni-navbar>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Portfolios</h1>
        {{-- Display Current Time --}}
        <p class="mb-4">Current Time: {{ $currentTime }}</p>
        
        {{-- Create Portfolio Button (only shown if user has no portfolio) --}}
        @if ($portfolios->isEmpty())
            <a href="{{ route('portfolio.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Portfolio
            </a>
        @endif

        {{-- Check if there are any portfolios --}}
        @if ($portfolios->isEmpty())
            <p class="mt-4 text-center text-gray-500">No portfolios found. Please create one!</p>
        @else
            {{-- Portfolio Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                @foreach($portfolios as $portfolio)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        {{-- Profile Picture --}}
                        <div class="w-full h-64 bg-gray-200">
                            @if($portfolio->profile_picture)
                                <img src="{{ asset('storage/' . $portfolio->profile_picture) }}" alt="{{ $portfolio->first_name }}'s profile" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-400 flex items-center justify-center text-white text-6xl font-bold">
                                    {{ strtoupper(substr($portfolio->first_name, 0, 1) . substr($portfolio->last_name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        {{-- Portfolio Details --}}
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-3">{{ $portfolio->first_name }} {{ $portfolio->last_name }}</h2>
                            <p class="text-gray-600 mb-3 text-lg">{{ $portfolio->email }}</p>
                            <p class="text-gray-600 mb-3"><span class="font-semibold">Gender:</span> {{ ucfirst($portfolio->gender) }}</p>
                            <p class="text-gray-600 mb-3"><span class="font-semibold">Date of Birth:</span> {{ $portfolio->dob }}</p>
                            <p class="text-gray-600 mb-3"><span class="font-semibold">Education:</span> {{ $portfolio->education }}</p>
                            @if($portfolio->description)
                                <p class="text-gray-600 mb-3"><span class="font-semibold">Description:</span> {{ Str::limit($portfolio->description, 150) }}</p>
                            @endif
                            <div class="flex space-x-4 mt-4">
                                @if($portfolio->cv)
                                    <a href="{{ asset('storage/' . $portfolio->cv) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Download CV</a>
                                @endif
                                @if($portfolio->certificates)
                                    <a href="{{ asset('storage/' . $portfolio->certificates) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Download Certificates</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-partials.alumni-navbar>
@endrole