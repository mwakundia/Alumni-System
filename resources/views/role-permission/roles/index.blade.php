<x-app-web-layout>
    @if(session('status'))
    <script>
        Swal.fire({
        title: "",
        text: "Role has been Added",
        icon: "success"
        });
    </script>
    @endif

    <div class="flex justify-center pt-10 gap-20">
        <div class="flex-none">
            <h1 class="text-2xl font-bold">Roles</h1>
        </div>
        <div class="flex-initial w-64">
            <h1>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    <a href="/roles/create">Add Role</a>
                </button>
            </h1>
        </div>
    </div>

    <div class="mt-10 max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <div class="table w-full overflow-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b-2">Id</th>
                        <th class="px-4 py-2 border-b-2">Name</th>
                        <th class="px-4 py-2 border-b-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border-b">{{ $role->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $role->name }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ url('roles/' . $role->id . '/edit') }}" class="text-blue-500 hover:underline">Edit</a>
                            <a href="{{ url('roles/' . $role->id . '/give-permissions') }}" class="text-red-500 hover:underline ml-4">Add/Edit Role Permission</a>
                        
                            <a href="{{ url('roles/' . $role->id . '/delete') }}" class="text-red-500 hover:underline ml-4">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-web-layout>
