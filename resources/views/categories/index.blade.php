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
                     <a href="{{ route('categories.create') }}">Add new category</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="pr-8">{{ $category->name }}</td> {{-- Added padding-right for spacing --}}
                                    <td>
                                        <a href="{{ route('categories.edit', $category) }}"
                                           class="inline-block px-4 py-2 mr-2 border border-blue-500 rounded text-blue-700 hover:bg-blue-100">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="px-4 py-2 border border-red-500 rounded text-red-700 hover:bg-red-100">
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

</x-app-layout>
