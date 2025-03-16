<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KaayParrainer')</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Contenu Principal -->
    <div class="flex">
        <!-- Sidebar -->
        @hasSection('no-sidebar')
            <!-- Pas de sidebar -->
        @else
            @switch(Auth::user()->role)
                @case('agentdge')
                    @include('layouts.sidebarDge')
                    @break

                @case('candidat')
                    @include('layouts.sidebarCandidat')
                    @break

                @case('electeur')
                    @include('layouts.sidebarElecteur')
                    @break

                @default
                    <div class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
                        <h5 class="text-lg font-semibold text-gray-700 dark:text-white">Erreur</h5>
                        <p class="text-gray-700 dark:text-white">Rôle utilisateur non reconnu.</p>
                    </div>
            @endswitch
        @endif

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
