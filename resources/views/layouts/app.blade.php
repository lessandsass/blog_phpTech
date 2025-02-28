<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog-Vipu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body class="bg-slate-900">

    <x-nav />

    <main class="mx-auto">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>


