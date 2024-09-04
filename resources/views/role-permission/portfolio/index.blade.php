<!-- resources/views/portfolio/index.blade.php -->

@role('alumni')
<x-partials.alumni-navbar>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Portfolios</h1>
    <p class="mb-4">Current Time: {{ $currentTime }}</p>
    <a href="{{ route('portfolio.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Create Portfolio</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $portfolio->first_name }}</td>
                    <td class="px-4 py-2">{{ $portfolio->last_name }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('portfolio.show', $portfolio->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">View</a>
                        <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-partials.alumni-navbar>
@endrole
