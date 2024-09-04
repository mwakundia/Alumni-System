<!-- resources/views/jobs/show.blade.php -->
@role('alumni')

<x-partials.alumni-navbar>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $job->job_title }}</h1>
        <p class="text-gray-700 mb-4">{{ $job->job_description	 }}</p> <br>
        <br>
        <br>
        <p class="text-gray-600 mb-6"><span class="text-4xl">Qualification: </span><br>{{ $job->job_qualification }}</p>

        <div id="view" class=" bg-stone-100 p-8 rounded-lg shadow-lg w-full mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-6">Apply for {{ $job->job_title }}</h1>
            <form action="{{ url('apply/'.$job->id) }}" method="POST" id="applyForm" class="space-y-4">
                @csrf
                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly value="{{ Auth::user()->name }}">
                </div>
                
               
                <div>
                    <label for="user_info" class="block text-sm font-medium text-gray-700">Why You're Interested in The Job</label>
                    <textarea id="user_info" name="user_info" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Not less than 50 words"></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md shadow-md hover:bg-blue-600">Submit</button>
                </div>
                
            </form>
            <button id="view" class="w-full bg-stone-500 text-white py-2 rounded-md shadow-md hover:bg-stone-300">Cancel</button>
            <div id="responseMessage" class="mt-4"></div>
        </div>

        
            
           
</div>



</x-partials.alumni-navbar>
@endrole
