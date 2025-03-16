<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KaayParrainer - DGE')</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
<!-- Navbar -->

    <!-- Navbar -->
    <nav class="bg-white shadow-md dark:bg-gray-900 p-4">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/Logo_KP.png') }}" class="h-12 w-12" alt="KaayParrainer Logo">
                <span class="text-2xl font-semibold dark:text-white">KaayParrainer</span>
            </a>
            <!-- User Info -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 dark:text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="flex">

        @include('layouts.sidebarDge')

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
