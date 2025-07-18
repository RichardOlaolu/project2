<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row">
            {{-- Sidebar --}}
            <div class="w-full md:w-1/4 md:mr-8 mb-8 md:mb-0">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-bold mb-4">Categories</h3>
                    <ul>
                        <li>
                            <a href="{{ route('posts.index') }}"
                               class="block px-2 py-1 rounded {{ empty($selectedCategory) ? 'font-bold text-blue-700 bg-blue-100' : 'hover:bg-gray-100' }}">
                                All
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li class="mt-2">
                                <a href="{{ route('posts.index', ['category' => $category->id]) }}"
                                   class="block px-2 py-1 rounded {{ $selectedCategory == $category->id ? 'font-bold text-blue-700 bg-blue-100' : 'hover:bg-gray-100' }}">
                                    <svg class="w-4 h-4 inline mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/>
                                    </svg>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- Main Content --}}
            <div class="w-full md:w-3/4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('posts.create') }}"
                           class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                Create new post
                            </span>
                        </a>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto border-collapse rounded-lg overflow-hidden shadow">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="text-left p-3">Title</th>
                                        <th class="text-left p-3">Category</th>
                                        <th class="text-left p-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($posts as $post)
                                        <tr class="even:bg-gray-50 hover:bg-blue-50 transition">
                                            <td class="pr-8 border-2 border-gray-300 rounded p-3">{{ $post->title }}</td>
                                            <td class="pr-8 p-3">{{ $post->category->name }}</td>
                                            <td>
                                                <a href="{{ route('posts.edit', $post) }}"
                                                   class="inline-block px-4 py-2 mr-2 border-2 border-blue-500 rounded text-blue-700 hover:bg-blue-100 transition"
                                                   title="Edit">
                                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2H7v-2l8-8z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block ml-2">
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
                                            <td colspan="3" class="p-3 text-center text-gray-500">No posts found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination (if using paginate) --}}
                        <div class="mt-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
