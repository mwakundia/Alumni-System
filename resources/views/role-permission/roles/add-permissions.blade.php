<x-app-web-layout>
    @if(session('status'))
        <script>
            Swal.fire({
                title: "",
                text: "{{session('status')}}",
                icon: "success"
            });
        </script>
    @endif
    <div class="flex justify-center text-center pt-10 gap-20">
        <div class="flex-none">
            <h1 class="text-2xl font-bold">Your Role: {{$role->name}}</h1>
        </div>
        <div class="flex-initial w-60">
            <h1>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    <a href="/roles">Back</a>
                </button>
            </h1>
        </div>
    </div>
    
    <div class="form mt-10 max-w-lg mx-auto bg-white p-8 shadow-lg rounded-lg">
        <form action="{{ url('roles/'.$role->id.'/give-permissions')}}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="name">
                    Permissions 
                </label>
    
                @error('permission')
                {{@message}}
                @enderror
                <div class="space-y-2"> <!-- Added a wrapper div with spacing -->
                    @foreach ($permissions as $permission )
                        <label class="flex items-center space-x-3"> <!-- Adjusted flexbox alignment and spacing -->
                            <input 
                                class="pl-5 px-5 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                value="{{$permission->name}}"
                                {{in_array($permission->id, $rolePermissions) ? 'checked' : ''}}
                                type="checkbox" 
                                name="permission[]" 
                                id="name"
                            />
                            <span>{{$permission->name}}</span> <!-- Wrapped permission name in a span for better alignment -->
                        </label>
                    @endforeach
                </div>
            </div>
    
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
    </x-app-web-layout>
    