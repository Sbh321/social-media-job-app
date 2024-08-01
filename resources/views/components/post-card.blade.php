@props(['post'])

<div class="bg-white p-4 rounded-lg shadow-xl mb-4">
    <div class="flex items-center mb-4">
        <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : asset('images/no-profile.jpg') }}"
            alt="image" class="rounded-full mr-2 w-10">
        <div>
            <h2 class="text-lg font-semibold">{{ $post->user->name }}</h2>
            <p class="text-gray-500 text-sm">5h</p>
        </div>
    </div>
    <p class="mb-4">
        {{ $post->status }}
    </p>
    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/no-post-image.jpg') }}" alt="Post Image"
        class="rounded-lg mb-4 w-full object-cover" />
    <div class="flex justify-between text-gray-500 text-sm">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-width="1.5">
                    <path
                        d="m9.99 16.5l-.975.474c-1.98.548-2.971.822-3.505.245c-.534-.576-.258-1.62.295-3.71l.142-.54c.157-.595.236-.891.197-1.186c-.04-.294-.193-.553-.499-1.07l-.278-.47C4.29 8.422 3.752 7.512 4.11 6.787c.36-.724 1.379-.783 3.418-.9l.527-.03c.58-.034.869-.05 1.122-.185c.252-.135.439-.372.813-.848l.34-.432c1.316-1.673 1.974-2.509 2.73-2.38s1.11 1.137 1.817 3.154l.183.522c.201.573.302.86.497 1.07c.196.212.464.324 1.001.547l.489.204c1.89.786 2.835 1.18 2.942 1.983c.092.686-.477 1.283-1.64 2.29" />
                    <path
                        d="M15.252 10.689c-.987-1.18-1.48-1.77-2.048-1.68c-.567.091-.832.803-1.362 2.227l-.138.368c-.15.405-.226.607-.373.756c-.146.149-.348.228-.75.386l-.367.143c-1.417.555-2.126.833-2.207 1.4c-.08.567.52 1.049 1.721 2.011l.31.25c.342.273.513.41.611.597c.1.187.115.404.146.837l.029.394c.11 1.523.166 2.285.683 2.545c.517.26 1.154-.155 2.427-.983l.329-.215c.362-.235.543-.353.75-.387c.208-.033.42.022.841.132l.385.1c1.485.386 2.228.58 2.629.173c.4-.407.193-1.144-.221-2.62l-.108-.38c-.117-.42-.176-.63-.147-.837c.03-.208.145-.39.374-.756l.21-.332c.807-1.285 1.21-1.927.94-2.438c-.269-.511-1.033-.553-2.562-.635l-.396-.022c-.434-.023-.652-.035-.841-.13c-.19-.095-.33-.263-.61-.599z" />
                </g>
            </svg>

            <span>14K</span>
        </div>
        <div>
            <span class="">667 comments</span>
        </div>
    </div>
    <hr class="my-2" />
    <div class="flex justify-between text-gray-500 text-sm">
        <button class="flex items-center hover:text-blue-500">
            <i class="fa-regular fa-star mr-2"></i>
            <span>Star</span>
        </button>
        <button class="flex items-center hover:text-blue-500">
            <i class="fa-regular fa-comments mr-2"></i>
            <span>Comment</span>
        </button>
        <button class="flex items-center hover:text-blue-500">
            <i class="fa-regular fa-bookmark mr-2"></i>
            <span>Save</span>
        </button>
    </div>
</div>
