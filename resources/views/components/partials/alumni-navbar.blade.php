<nav class="bg-gradient-to-r from-fuchsia-950 via-gray-900 to-black p-4 flex justify-between items-center shadow-lg">
    <img width="140" class="hover:opacity-80 transition duration-300 rounded-md" src="https://raw.githubusercontent.com/kiruikev99/ALUMNI-SYSTEM-PROJECT-LARAVEL-/master/resources/views/components/partials/LOGO3.png" alt="kk">

    <div class="flex-grow">
        <ul class="text-red-500 cursor-pointer font-serif flex gap-8 text-sm mt-2 ml-3">
            <li class="hover:text-gray-400 transition duration-300"> <a href="/dashboard">Find Job</a></li>
            <li class="hover:text-gray-400 transition duration-300">Your Portfolio</li>
        </ul>
    </div>

    <ul class="text-white flex gap-8 items-center">
        <li>
            <input class="bg-gray-800 text-white placeholder-gray-500 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Search Job" type="text">
        </li>
        <li class="relative">
            <span id="userDropdown" class="cursor-pointer text-xl">{{ Auth::user()->name }} <i class="fas fa-chevron-down ml-1"></i></span>
            <ul id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-stone-800 text-white rounded-lg shadow-lg hidden">
                <li class="block px-4 py-2 text-sm hover:bg-gray-700 transition duration-300">
                    <a href="/profile">Edit Profile</a>
                </li>
                <li class="block px-4 py-2 text-sm hover:bg-gray-700 transition duration-300">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
{{$slot}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.getElementById('userDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        userDropdown.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!userDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>

<!-- Ensure you have FontAwesome included for the dropdown icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
