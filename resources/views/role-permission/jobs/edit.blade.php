<x-app-web-layout>
    <div class="w-full">
    <div class="flex justify-center text-center pt-10 gap-20">
        <div class="flex-none">
            <h1 class="text-2xl font-bold">Job Information Details</h1>
        </div>
        <div class="flex-initial w-60">
            <h1>
                <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    <a href="/job">Back</a>
                </button>
            </h1>
        </div>
    </div>
    <style>
        label{
            font-size: 30px;
        }
    </style>

    <div class="form mt-10  mx-auto bg-white p-8 shadow-lg rounded-lg">
        <form action="{{ url('jobs/'.$job->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="gap-6">
                <div>
                    <label for="job_title" class="block text-lg font-medium text-gray-700">Job Title</label>
                    <input id="job_title"  value="{{$job->job_title}}" type="text" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 lg:text-lg"
                           >
                </div>
                <div>
                    <label for="job_name" class="block text-lg font-medium text-gray-700">Job Name</label>
                    <input id="job_name" name="job_name" value="{{$job->job_name}}" type="text" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 lg:text-lg"
                           placeholder="Enter job name">
                </div>
                <div>
                    <label for="job_type" class="block text-lg font-medium text-gray-700">Job Category Type</label>
                    <input value="{{$job->job_type}}" id="job_type" name="job_type" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 lg:text-lg" />
                </div>
                <div>
                    <label for="job_type" class="block text-lg font-medium text-gray-700">Job Duration</label>
                    <input id="job_type" name="job_duration" required
                    value="{{$job->job_duration}}"    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg"/>
                    
                </div>
                <div class="col-span-2">
                    <label for="job_description" class="block text-lg font-medium text-gray-700">Job Description</label>
                    <input id="job_description" name="job_description"value="{{$job->job_description}}" rows="5" required
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 h-10 sm:text-lg"
                              placeholder="Enter job description"></input>
                </div>
                <div class="col-span-2">
                    <label for="job_qualification" class="block text-lg font-medium text-gray-700">Job Qualification</label>
                    <input id="job_qualification" name="job_qualification" rows="2" required
                    value="{{$job->job_qualification}}"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg"
                              placeholder="Enter job qualification"></inpu>
                </div>
                <div>
                    <label for="job_location" class="block text-lg font-medium text-gray-700">Job Location</label>
                    <input value="{{$job->job_location}}" id="job_location" name="job_location" type="text" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg"
                           placeholder="Enter job location">
                </div>
                <div>
                    <label for="job_amount" class="block text-lg font-medium text-gray-700">Job Amount</label>
                    <input value="{{$job->job_amount}}" id="job_amount" name="job_amount" type="number" step="0.01" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-lg"
                           placeholder="Enter job amount">
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Job
                </button>
            </div>
        </form>
    </div>
</x-app-web-layout>
