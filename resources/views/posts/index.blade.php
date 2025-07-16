<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            {{-- Sidebar --}}
            <div class="w-1/4 mr-8">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-bold mb-4">Categories</h3>
                    <ul>
                        <li>
                            <a href="{{ route('posts.index') }}"
                               class="{{ empty($selectedCategory) ? 'font-bold text-blue-700' : '' }}">
                                All
                            </a>
                        </li>
                        @foreach($categories as $category)
                            <li class="mt-2">
                                <a href="{{ route('posts.index', ['category' => $category->id]) }}"
                                   class="{{ $selectedCategory == $category->id ? 'font-bold text-blue-700' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- Main Content --}}
            <div class="w-3/4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('posts.create') }}">Add new post</a>
                        <br /><br />
                        <table>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="pr-8 border-2 border-gray-300 rounded p-3">{{ $post->title }}</td>
                                        <td class="pr-8 p-3">{{ $post->category->name }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}"
                                               class="inline-block px-4 py-2 mr-2 border-2 border-blue-500 rounded text-blue-700 hover:bg-blue-100">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Are you sure?')"
                                                        class="px-4 py-2 border-2 border-red-500 rounded text-red-700 hover:bg-red-100">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
