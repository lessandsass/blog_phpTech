<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog-Vipu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900">

    <nav class="p-6 bg-gray-800 text-gray-300 flex justify-between">
        <ul class="flex items-center">

            <li>
                <a href="{{ route('home') }}" class="p-3">
                    Home
                </a>
            </li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="p-3">
                    Dashboard
                </a>
            </li>
        </ul>

        <ul class="flex items-center">
            @if (auth()->guard('admin')->check())
                <li>
                    {{-- <a href="#" class="p-3">{{ auth()->user()->name }}</a> --}}
                </li>

                <li>
                    <form action="{{ route('admin.logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>

            @else
                <li>
                    <a href="{{ route('admin.auth') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="" class="p-3">Register</a>
                </li>
            @endif
        </ul>
    </nav>

    <header>
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Header
        </h1>
    </header>

    <main class="container mx-auto mt-6 px-6">
        @yield('content')
    </main>

    <footer>
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Footer
        </h1>
    </footer>

</body>
</html>


