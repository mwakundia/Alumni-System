<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ $tittle ?? 'Alumni System'}}</title>
</head>
@role('alumni')
<x-partials.alumni-navbar>
    <div class="container flex mx-auto px-20 pt-10">
        <div>


            <h1 class="text-4xl pb-4"><b>{{$title}}</b></h1>

            <div class="text-lg"></div>
            <h4>{{$name}}</h4>
            <br><br>
            <hr>

            <div class="">
                <h3><b>About Us</b></h3>
                <p>{{$description}}</p>
                <br>
                <h3><b>Job Qualification</b></h3>
                <p>{{$qualification}}</p>
                <br>
                <hr>
                <br>

                <br>

                <p class="center"><b> KSH: {{$amount}}</b><br>Fixed Amount</p>
            </div>
        </div>
        <div>
            <div class="pt-10 p-20 ">
                <button onclick="showApplyForm()" class="bg-red-600 p-3 rounded-lg w-32  text-white">
                    Apply 
                </button>
                <button class="bg-transparent p-3 rounded-lg w-32  text-black">
                    Save Job 
                </button>
            </div>
        </div>


        <div id="view" class="hidden bg-stone-100 p-8 rounded-lg shadow-lg w-full mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-6">Apply to {{ $name }}</h1>
            <form action="{{ url('apply/'.$id) }}" method="POST" id="applyForm" class="space-y-4">
                @csrf
                <div>
                    <label for="fname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly value="{{Auth::user()->name}}">
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