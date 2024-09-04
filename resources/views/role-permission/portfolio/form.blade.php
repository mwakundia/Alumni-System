<!-- resources/views/portfolio/form.blade.php -->

<div class="mb-4">
    <label for="first_name" class="block text-gray-700">First Name</label>
    <input type="text" name="first_name" class="form-control mt-1 block w-full" value="{{ old('first_name', $portfolio->first_name ?? '') }}">
</div>
<div class="mb-4">
    <label for="last_name" class="block text-gray-700">Last Name</label>
    <input type="text" name="last_name" class="form-control mt-1 block w-full" value="{{ old('last_name', $portfolio->last_name ?? '') }}">
</div>
<div class="mb-4">
    <label for="dob" class="block text-gray-700">Date of Birth</label>
    <input type="date" name="dob" class="form-control mt-1 block w-full" value="{{ old('dob', $portfolio->dob ?? '') }}">
</div>
<div class="mb-4">
    <label for="education" class="block text-gray-700">Education</label>
    <input type="text" name="education" class="form-control mt-1 block w-full" value="{{ old('education', $portfolio->education ?? '') }}">
</div>
<div class="mb-4">
    <label for="certificates" class="block text-gray-700">Certificates</label>
    <input type="file" name="certificates" class="form-control mt-1 block w-full">
    @if(isset($portfolio) && $portfolio->certificates)
        <a href="{{ Storage::url($portfolio->certificates) }}" target="_blank" class="text-blue-500 hover:underline">View existing certificate</a>
    @endif
</div>
<div class="mb-4">
    <label for="skills" class="block text-gray-700">Skills</label>
    <textarea name="skills" class="form-control mt-1 block w-full">{{ old('skills', $portfolio->skills ?? '') }}</textarea>
</div>
<div class="mb-4">
    <label for="cv" class="block text-gray-700">CV</label>
    <input type="file" name="cv" class="form-control mt-1 block w-full">
    @if(isset($portfolio) && $portfolio->cv)
        <a href="{{ Storage::url($portfolio->cv) }}" target="_blank" class="text-blue-500 hover:underline">View existing CV</a>
    @endif
</div>
<div class="mb-4">
    <label for="description" class="block text-gray-700">Description</label>
    <textarea name="description" class="form-control mt-1 block w-full">{{ old('description', $portfolio->description ?? '') }}</textarea>
</div>
<div class="mb-4">
    <label for="profile_picture" class="block text-gray-700">Profile Picture</label>
    <input type="file" name="profile_picture" class="form-control mt-1 block w-full">
    @if(isset($portfolio) && $portfolio->profile_picture)
        <img src="{{ Storage::url($portfolio->profile_picture) }}" alt="Profile Picture" class="mt-2 w-24 h-24 object-cover rounded-full">
    @endif
</div>
