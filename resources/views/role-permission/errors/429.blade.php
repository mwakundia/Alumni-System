<!-- resources/views/errors/429.blade.php -->
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <h1 class="text-6xl font-bold text-gray-800">429</h1>
    <p class="text-xl mt-2">Too Many Requests</p>
    <p class="text-gray-600 mt-4">You have sent too many requests in a given amount of time. Please try again later.</p>
</div>
@endsection
