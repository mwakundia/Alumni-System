<!-- resources/views/errors/400.blade.php -->
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <h1 class="text-6xl font-bold text-gray-800">400</h1>
    <p class="text-xl mt-2">Bad Request</p>
    <p class="text-gray-600 mt-4">The server cannot process the request due to client error.</p>
</div>
@endsection
