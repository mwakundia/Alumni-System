<x-app-web-layout>
    <div class="w-full min-h-screen bg-gradient-to-r from-gray-100 via-blue-100 to-blue-200 py-10">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-4xl font-extrabold text-gray-800">Job Information Details</h1>
                <a href="/job" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white py-2 px-5 rounded-full shadow-lg transform transition duration-300 hover:scale-105 hover:bg-blue-700">
                    Back
                </a>
            </div>

            <div class="bg-white p-10 shadow-xl rounded-lg">
                <form action="{{ url('job') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div>
                            <label for="job_title" class="block text-lg font-semibold text-gray-700">Job Title</label>
                            <input id="job_title" name="job_title" type="text" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter job title">
                        </div>
                        <div>
                            <label for="job_position" class="block text-lg font-semibold text-gray-700">Job Position</label>
                            <input id="job_position" name="job_position" type="text" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter job position">
                        </div>
                        <div>
                            <label for="job_type" class="block text-lg font-semibold text-gray-700">Job Category Type</label>
                            <select id="job_type" name="job_type" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm">
                                <option value="">Select job category type</option>
                                <option value="Software Developer">Software Developer</option>
                                <option value="Web Developer">Web Developer</option>
                                <option value="Network Engineer">Network Engineer</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        <div>
                            <label for="job_duration" class="block text-lg font-semibold text-gray-700">Job Duration</label>
                            <select id="job_duration" name="job_duration" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm">
                                <option value="">Select job type</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label for="job_description" class="block text-lg font-semibold text-gray-700">Job Description</label>
                            <textarea id="job_description" name="job_description" rows="5" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter job description"></textarea>
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label for="job_qualification" class="block text-lg font-semibold text-gray-700">Job Qualification</label>
                            <textarea id="job_qualification" name="job_qualification" rows="4" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter job qualification"></textarea>
                        </div>
                        <div>
                            <label for="job_location" class="block text-lg font-semibold text-gray-700">Job Location</label>
                            <input id="job_location" name="job_location" type="text" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter job location">
                        </div>
                        <div>
                            <label for="salary" class="block text-lg font-semibold text-gray-700">Salary</label>
                            <input id="salary" name="salary" type="number" step="0.01" required
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 text-sm"
                                placeholder="Enter salary">
                        </div>
                    </div>

                    <div class="flex justify-end mt-10">
                        <button type="submit"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 border border-transparent rounded-md font-semibold text-white shadow-lg transform transition duration-300 hover:scale-105 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-web-layout>
