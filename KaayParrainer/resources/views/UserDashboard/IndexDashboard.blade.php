<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
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
                <img src="{{ asset('images/Logo_KP.png') }}" class="h-12 w-12" alt="KaayParrainer Logo">
                <span class="text-2xl font-semibold dark:text-white">KaayParrainer</span>
            </a>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Acceuil</a>
                  </li>
                  <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Partie Politiques</a>
                  </li>
                  <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
            </li>
            <li>
              <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>
          </ul>
        </div>

            {{-- <!-- Profil utilisateur -->
            <div class="flex items-center space-x-4">
                <button type="button" class="flex items-center bg-gray-800 text-white px-3 py-2 rounded-lg focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">Utilisateur</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
            </div> --}}
        </div>
    </nav>

    <!-- Contenu Principal -->
    <div class="flex">
        <!-- Sidebar (Menu de navigation) -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
            <h5 class="text-lg font-semibold text-gray-700 dark:text-white">Menu</h5>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">grid_view</span>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">person_outline</span>
                        <span class="ml-3">Information</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">insights</span>
                        <span class="ml-3">Statistiques</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">mail_outline</span>
                        <span class="ml-3">Messages</span>
                        <span class="ml-auto bg-blue-500 text-white px-2 py-1 text-xs rounded-full">14</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">settings</span>
                        <span class="ml-3">Paramètres</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-sharp">logout</span>
                        <span class="ml-3">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Contenu principal -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold">Users_Dashboard</h1>

            <h1 class="text-3xl text-gray-800 mb-6">Statistiques des Parrainages</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Graphique en ligne -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Évolution des Parrainages</h2>
                    <canvas id="lineChart"></canvas>
                </div>

                <!-- Graphique en barres -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">Comparaison des Parrainages par Mois</h2>
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <script>
                // Graphique en ligne (évolution des parrainages)
                const ctx1 = document.getElementById('lineChart').getContext('2d');
                new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
                        datasets: [{
                            label: 'Nombre de Parrainages',
                            data: [120, 150, 180, 300, 280, 350, 400],
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });

                // Graphique en barres (parrainages par mois)
                const ctx2 = document.getElementById('barChart').getContext('2d');
                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
                        datasets: [{
                            label: 'Nombre de Parrainages',
                            data: [120, 150, 180, 300, 280, 350, 400],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(99, 255, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(99, 255, 132, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            </script>

            <!-- Table des Parrainages récents -->
            <div class="mt-6">
                <h2 class="text-xl font-bold mb-4">Parrainages récents</h2>
                <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="p-3">Nom</th>
                            <th class="p-3">Prénom</th>
                            <th class="p-3">Numéro ID</th>
                            <th class="p-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-3">Diallo</td>
                            <td class="p-3">Mamadou</td>
                            <td class="p-3">12345</td>
                            <td class="p-3 text-yellow-600">En attente</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-3">Ba</td>
                            <td class="p-3">Aissatou</td>
                            <td class="p-3">67890</td>
                            <td class="p-3 text-green-600">Validé</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
