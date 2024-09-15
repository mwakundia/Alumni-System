<!-- resources/views/portfolio/edit.blade.php -->
@role('alumni')
<x-partials.alumni-navbar>

<div class="container mx-auto px-4">
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <h1 class="text-3xl font-bold mb-4">Edit Portfolio</h1>
    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="profile_picture" class="block text-gray-700 font-bold">Profile Picture:</label>
           
            @if ($portfolio->profile_picture)
                <p>Current Profile Picture:</p>
                <img w src="{{ asset('storage/' . $portfolio->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full">
            @endif
            <input type="file" name="profile_picture" class="w-full p-2 border rounded">
            <br><br>
        </div>

        <div>
            <label for="first_name" class="block text-gray-700 font-bold">First Name:</label>
            <input type="text" name="first_name" value="{{ $portfolio->first_name }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="last_name" class="block text-gray-700 font-bold">Last Name:</label>
            <input type="text" name="last_name" value="{{ $portfolio->last_name }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="dob" class="block text-gray-700 font-bold">Date of Birth:</label>
            <input type="date" name="dob" value="{{ $portfolio->dob }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="education" class="block text-gray-700 font-bold">Education:</label>
            <input type="text" name="education" value="{{ $portfolio->education }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="certificates" class="block text-gray-700 font-bold">Certificates:</label>
            <input type="file" name="certificates" class="w-full p-2 border rounded">
            @if ($portfolio->certificates)
                <p>Current Certificate: <a href="{{ asset('storage/app/public/' . $portfolio->certificates) }}" class="text-blue-500 hover:underline">Download Certificate</a></p>
            @endif
        </div>

        <div>
            <label for="skills" class="block text-gray-700 font-bold">Skills:</label>
            <input type="text" name="skills" value="{{ $portfolio->skills }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="cv" class="block text-gray-700 font-bold">CV:</label>
            <input type="file" name="cv" class="w-full p-2 border rounded">
            @if ($portfolio->cv)
                <p>Current CV: <a href="{{ asset('storage/app/public/' . $portfolio->cv) }}" class="text-blue-500 hover:underline">Download CV</a></p>
            @endif
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-bold">Description:</label>
            <textarea name="description" class="w-full p-2 border rounded">{{ $portfolio->description }}</textarea>
        </div>

       

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded">Update</button>
        </div>
    </form>
</div>
<x-partials.alumni-navbar>
@endrole

