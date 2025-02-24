<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog-Vipu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>

</head>
<body class="bg-slate-900">

    <nav class="p-6 bg-gray-800 text-gray-300 flex justify-between">
        <ul class="flex items-center">

            <li>
                <a href="{{ route('home') }}" class="px-2 py-3 mx-1">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="px-2 py-3 mx-1">
                    Dashboard
                </a>
            </li>
        </ul>

        <ul class="flex items-center">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="px-2 py-3 mx-1">
                    About
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="px-2 py-3 mx-1">
                    Services
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="px-2 py-3 mx-1">
                    FAQ
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="px-2 py-3 mx-1">
                    Blog
                </a>
            </li>

            @if (auth()->guard('admin')->check())
                <li>
                    {{-- <a href="#" class="px-2 py-3 mx-1">{{ auth()->user()->name }}</a> --}}
                </li>

                <li>
                    <form action="{{ route('admin.logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>

            @else
                <li>
                    <a href="{{ route('admin.auth') }}" class="px-2 py-3 mx-1">Login</a>
                </li>
                <li>
                    <a href="" class="px-2 py-3 mx-1">Register</a>
                </li>
            @endif
        </ul>
    </nav>

    {{-- @include('layouts.header') --}}

    <main class="container mx-auto">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>


