<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KaayParrainer')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
        <!-- Navbar -->
        <nav class="bg-white shadow-md dark:bg-gray-900 p-4">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-3">
                    <img
                        src="{{ asset('images/Logo_KP.png') }}"
                        class="h-12 w-12"
                        alt="KaayParrainer Logo">
                    <span class="text-2xl font-semibold dark:text-white">KaayParrainer</span>
                </a>

                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a
                                {{-- href="{{url('/PariesPolitiques')}}" --}}
                                href="{{url('/#')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Parties Politiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url('/statistique')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Statistiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url('/login')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
