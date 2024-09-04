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

    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="flex justify-around pt-10 gap-20">
        <div class="flex-none pt-4">
            <h4 class="text-sm ">Home>Post Job</h4><hr>
        </div>
        <div>
            <input class="border-solid rounded-sm w-96 border-2 p-2 " placeholder="Search Job" type="text"> 
        </div>
        <div class="flex-initial w-64">
            <h1>
                <button class="bg-amber-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    <a href="/job/create">Add JOBS</a>
                </button>
            </h1>
        </div>
    </div>

    <div class="mt-10 w-64-lg mx-auto bg-white flex flex-wrap gap-20 p-8 shadow-lg rounded-lg">
        @foreach ($jobs as $job)
            <button href="#"
                class="block max-w-sm p-10 bg-white text-left border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->job_title }}</h5>


                
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $job->job_name }}</p>
                <br>
                <div class="">
                    <div class="flex text-sm  items-center text-gray-700 dark:text-gray-400 mb-2">
                        <i class="fas fa-map-marker-alt mr-2"></i> {{ $job->job_location }}
                    </div>
                    <div class="flex text-sm items-center text-gray-700 dark:text-gray-400 mb-2">
                        <i class="fas fa-clock mr-2"></i>{{ $job->job_duration }}
                    </div>
                    <div class="flex text-sm items-center text-gray-700 dark:text-gray-400 mb-2">
                        <i class="fas fa-money-bill-alt mr-2"></i> ${{ $job->job_amount }}
                    </div>
                <br>
                </div>
                <div class="buttons">
                    <a href="{{ url('job/' . $job->id . '/delete') }}" class="bg-red-500 p-2 w-1/4"> Delete</a>
                    <a  href="{{ url('job/' . $job->id . '/edit') }}" class="bg-lime-500 p-2 w-1/4" >Update</a>

                </div>
               
                
        </button>
        @endforeach
    </div>
</x-app-web-layout>
