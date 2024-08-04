<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>ProConnect | Find Developer Jobs & Projects</title>
    <style>
        .scrollable {
            /* max-height: calc(100vh - 6rem); */
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .scrollable::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-blueGray-200">
    <nav class="flex justify-between items-center">
        <div class="flex-1 flex items-center">
            <a href="/"><img class="w-24 ml-6 p-2" src="{{ asset('images/logo.png') }}" alt=""
                    class="logo" /></a>

            @auth
                <div class="lg:block hidden ml-2">
                    <span class="font-bold uppercase">
                        Welcome
                        {{ auth()->user()->name }}
                    </span>
                </div>
            @endauth
        </div>

        {{-- lg:mr-52 ml-24 --}}
        <div class="items-center hidden md:flex flex-1 justify-center">
            <form method="GET" action="/posts/search" class="flex items-center">
                @php
                    // Get the current keyword from the query string
                    $keyword = request()->query('keyword', '');
                @endphp
                <input type="text" name="keyword" placeholder="Search.."
                    class="flex-1 bg-gray-100 rounded-full py-2 px-4 outline-none mr-2" value="{{ $keyword }}" />
                <div class="flex justify-end">
                    <button type="submit" class="">
                        <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                    </button>
                </div>
            </form>
        </div>

        <ul class="flex space-x-6 mr-6 text-lg items-center flex-1 justify-end">
            @auth
                <li class="lg:hidden">
                    {{-- <a href="/jobs/manage" class="hover:text-blue-500 flex justify-center items-center"><i
                            class="fa-solid fa-gear mr-1"></i>
                        <span class="hidden lg:block">Profile</span></a> --}}
                    <div class="w-12 h-12 rounded-full bg-black flex justify-center items-center">
                        <a href="/users/{{ auth()->user()->id }}">
                            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('images/no-profile.jpg') }}"
                                alt="Profile Picture" class="rounded-full w-10 h-10 border-4 border-blueGray-200" />
                        </a>
                    </div>
                </li>
                <li class="lg:hidden">
                    <a href="/jobs" class="hover:text-blue-500 flex justify-center items-center"><i
                            class="fa-solid fa-code text-lg"></i>
                        <span class="hidden lg:block">Projects</span></a>
                </li>
                <li class="lg:hidden">
                    <a href="/jobs/manage" class="hover:text-blue-500 flex justify-center items-center"><i
                            class="fa-solid fa-gear mr-1"></i>
                        <span class="hidden lg:block">Manage</span></a>
                </li>
                <li>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-blue-500 flex justify-center items-center"><i
                                class="fa-solid fa-door-closed"></i>
                            <span class="hidden md:block ml-2">Logout</span></button>
                    </form>
                @else
                <li>
                    <a href="/register" class="hover:text-blue-500 flex justify-center items-center"><i
                            class="fa-solid fa-user-plus"></i>
                        <span class="hidden md:block ml-2">Register</span></a>
                </li>
                <li>
                    <a href="/login" class="hover:text-blue-500 flex justify-center items-center"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span class="hidden md:block ml-2">Login</span></a>
                </li>
            @endauth
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    @if (!isset($showFooter) || $showFooter)
        <footer
            class="w-full flex items-center justify-start font-bold bg-blue-400 text-white h-24 mt-14 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        </footer>
    @endif
    <x-flash-message />
</body>

</html>
