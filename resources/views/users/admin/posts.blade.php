<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Posts
            </h1>
            <div class="mb-4">
                <a href="/posts/create"
                    class="rounded-lg bg-black text-white py-2 px-5 hover:bg-white hover:text-black border-2 hover:border-black border-blueGray transition-all">Add
                    Post</a>
            </div>
        </header>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">ID</th>
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">User (ID)</th>
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">Status</th>
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">Hashtags</th>
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">Edit</th>
                    <th class="px-4 py-2 border-t border-b border-gray-300 text-left text-lg">Delete</th>
                </tr>
            </thead>
            <tbody>
                @unless ($posts->isEmpty())
                    @foreach ($posts as $post)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p>
                                    {{ $post->id }}
                                </p>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/users/{{ $post->user_id }}" class="hover:underline">
                                    {{ $post->user->name }}
                                </a>
                                <span>
                                    ({{ $post->user_id }})
                                </span>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                {{-- <a href="/posts/{{ $post->id }}" class="hover:underline"> add this when you create view for a single post --}}
                                <a href="#" class="hover:underline">
                                    {{ $post->status }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <x-post-tags :hashtagsCsv="$post->hashtags" />
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/posts/{{ $post->id }}/edit" class="text-blue-400 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/posts/{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 focus:outline-none"><i
                                            class="fa-solid fa-trash mr-2"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="text-lg py-8 px-4 border-t border-b border-gray-300" colspan="3">
                            <p class="text-center">No posts found.</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>

        <div class="mt-6 p-4">
            {{ $posts->links() }}
        </div>
    </x-card>
</x-layout>
