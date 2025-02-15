<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>

        <!-- Tailwind CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet">
        <!-- Google Fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0"/>
        <!-- CSS Personnalisé -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <span
                        class="text-2xl font-semibold dark:text-white"
                        href="{{ asset('welcome.blade.php') }}">KaayParrainer</span>
                </a>

                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a
                                href="#"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Parties Politiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url('/statistique')}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Statistiques</a>
                        </li>
                        <li>
                            <a
                                href="{{url("/Contact")}}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <!-- Contenu Principal -->
            <div class="flex">
                <!-- Sidebar (Menu de navigation) -->
                <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-white">Menu</h5>
                    <ul class="mt-4 space-y-2">
                        <li>
                            <a
                                href="{{url("/ContentDashboard")}}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">grid_view</span>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('userProfile') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">person_outline</span>
                                <span class="ml-3">Information</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('Message') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">mail_outline</span>
                                <span class="ml-3">Messages</span>
                                <span class="ml-auto bg-blue-500 text-white px-2 py-1 text-xs rounded-full">14</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('parrainage') }}"
                                class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-symbols-sharp">draw</span>
                                <span class="ml-3">Parrainage</span>
                            </a>
                        </li>
                        <li>
                            {{--
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Déconnexion
                        </button>
                    </form> --}}

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span class="material-symbols-sharp">logout</span>
                            <span class="ml-3">Déconnexion</span>
                        </button>
                    </form>

                        </li>
                    </ul>
                </aside>

                @yield(section: 'Contenus')

            </div>

            <!-- JavaScript -->
            <script src="{{ asset('js/script.js') }}"></script>
        </body>
    </html>
