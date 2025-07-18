<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="mb-8 text-gray-600">{{ __("You're logged in!") }}</p>

                    {{-- Profile Section --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-blue-100 p-6 rounded-lg shadow flex flex-col items-start">
                            <h4 class="font-semibold text-blue-800 mb-2 text-lg">Profile</h4>
                            <p class="mb-4">View and edit your profile information.</p>
                            <a href="{{ route('profile.edit') }}" class="text-blue-700 font-semibold underline hover:text-blue-900 transition">Go to Profile</a>
                        </div>
                    </div>

                    {{-- Latest Post Tab --}}
                    <div class="bg-white p-8 rounded-lg shadow mb-8">
                        <h3 class="text-xl font-bold mb-6 border-b pb-2">Latest Post</h3>
                        <div class="overflow-x-auto max-h-96">
                            <table class="w-full table-auto border-collapse rounded-lg overflow-hidden">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="text-left p-3">Title</th>
                                        <th class="text-left p-3">Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($posts as $post)
                                        <tr class="even:bg-gray-50 hover:bg-blue-50 transition">
                                            <td class="p-3 border-b">{{ $post->title }}</td>
                                            <td class="p-3 border-b">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="p-3 text-center text-gray-500">No posts found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
