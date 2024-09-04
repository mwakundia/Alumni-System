<!-- resources/views/portfolio/create.blade.php -->

@role('alumni')
<x-partials.alumni-navbar>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Create Portfolio</h1>
   
   
   
</div>
<form id="portfolioForm" method="POST" action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
    @csrf

    @error('password_confirmation')
        <div class="text-red-500 mb-4">{{ $message }}</div>
    @enderror

    <div class="step">
        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
        <input type="text" id="first_name" name="first_name"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('first_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
        <input type="text" id="last_name" name="last_name"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('last_name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
        <select id="gender" name="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select Gender</option>
            <option value="male" >Male</option>
            <option value="female">Female</option>
        </select>
        @error('gender')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth:</label>
        <input type="date" id="dob" name="dob"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('dob')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="education" class="block text-gray-700 text-sm font-bold mb-2">Education:</label>
        <textarea id="education" name="education" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        @error('education')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step ">
        <label for="job_type" class="block text-sm font-medium text-gray-700">Job Category Type</label>
        <select id="job_type" name="skills" 
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="">Select job category type</option>
            <option value="Software Developer">Software Developer</option>
            <option value="Web Developer">Web Developer</option>
            <option value="Network Engineer">Network Engineer</option>
            <option value="Administrator">Administrator</option>
        </select>
        @error('skills')
        <div class="text-red-500 italic">
        {{$message}}
    </div>

        @enderror
    </div>

    <div class="step">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="step">
        <label for="certificates" class="block text-gray-700 text-sm font-bold mb-2">Upload Certificates:</label>
        <input type="file" id="certificates" name="certificates" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('certificates')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="cv" class="block text-gray-700 text-sm font-bold mb-2">Upload CV:</label>
        <input type="file" id="cv" name="cv" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('cv')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
        <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="step">
        <label for="profile_picture" class="block text-gray-700 text-sm font-bold mb-2">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('profile_picture')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="text-right">
        <br><br>
        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
    </div>

</form>
</x-partials.alumni-navbar>
@endrole
