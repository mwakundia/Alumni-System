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
<body>
    <div>
        @role('super-admin|admin')
        <x-partials.navbar/>
        @endrole
        
        @role('alumni')
        <x-partials.alumni-navbar/>
        @endrole

        {{ $slot }} 
      
    </div>
    
</body>
</html>