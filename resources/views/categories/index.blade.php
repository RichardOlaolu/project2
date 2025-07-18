<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Add New Category Button --}}
                    <a href="{{ route('categories.create') }}"
                       class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add new category
                        </span>
                    </a>

                    {{-- Search Bar --}}
                    <form method="GET" action="{{ route('categories.index') }}" class="mb-4 flex items-center">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search categories..."
                               class="border border-gray-300 rounded px-3 py-2 mr-2 focus:outline-none focus:ring focus:border-blue-300 w-64">
                        <button type="submit"
                                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                            <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <path d="M21 21l-4.35-4.35" />
                            </svg>
                            Search
                        </button>
                    </form>

                    {{-- Show error if search yields no results --}}
                    @if(request('search') && $categories->isEmpty())
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                            No categories found for "{{ request('search') }}".
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse rounded-lg overflow-hidden shadow">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="text-left p-3">Name</th>
                                    <th class="text-left p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr class="even:bg-gray-50 hover:bg-blue-50 transition">
                                        <td class="pr-8 p-3 border-b">{{ $category->name }}</td>
                                        <td class="p-3 border-b">
                                            <a href="{{ route('categories.edit', $category) }}"
                                               class="inline-block px-4 py-2 mr-2 border-2 border-blue-500 rounded text-blue-700 hover:bg-blue-100 transition"
                                               title="Edit">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2H7v-2l8-8z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Are you sure?')"
                                                        class="px-4 py-2 border-2 border-red-500 rounded text-red-700 hover:bg-red-100 transition"
                                                        title="Delete">
                                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="p-3 text-center text-gray-500">No categories found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
