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
                    <p class="mb-6">{{ __("You're logged in!") }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-100 p-4 rounded shadow">
                            <h4 class="font-semibold text-blue-800 mb-2">Profile</h4>
                            <p>View and edit your profile information.</p>
                            <a href="{{ route('profile.edit') }}" class="text-blue-600 underline">Go to Profile</a>
                        </div>
                    </div>

                    {{-- Latest Post Tab --}}
                    <div class="bg-white p-6 rounded shadow mb-8">
                        <h3 class="text-xl font-bold mb-4">Latest Post</h3>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left p-2">Title</th>
                                    <th class="text-left p-2">Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="p-2 border-b">{{ $post->title }}</td>
                                        <td class="p-2 border-b">{{ $post->content }}</td>
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
