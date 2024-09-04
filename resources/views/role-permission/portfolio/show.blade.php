<!-- resources/views/portfolio/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Portfolio Details</h1>
    <div class="mb-4">
        <strong>First Name:</strong>
        <p>{{ $portfolio->first_name }}</p>
    </div>
    <div class="mb-4">
        <strong>Last Name:</strong>
        <p>{{ $portfolio->last_name }}</p>
    </div>
    <div class="mb-4">
        <strong>Date of Birth:</strong>
        <p>{{ $portfolio->dob }}</p>
    </div>
    <div class="mb-4">
        <strong>Education:</strong>
        <p>{{ $portfolio->education }}</p>
    </div>
    <div class="mb-4">
        <strong>Skills:</strong>
        <p>{{ $portfolio->skills }}</p>
    </div>
    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $portfolio->description }}</p>
    </div>
    <a href="{{ route('portfolio.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
</div>
@endsection
