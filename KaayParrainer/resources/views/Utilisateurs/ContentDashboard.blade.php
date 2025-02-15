@extends('Utilisateurs.BaseDashboard')
@section('Contenus')
                    <!-- Contenu princpal -->
                    <main class="flex-1 p-6">
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
                            const ctx1 = document
                                .getElementById('lineChart')
                                .getContext('2d');
                            new Chart(ctx1, {
                                type: 'line',
                                data: {
                                    labels: [
                                        'Jan',
                                        'Fév',
                                        'Mar',
                                        'Avr',
                                        'Mai',
                                        'Juin',
                                        'Juil'
                                    ],
                                    datasets: [
                                        {
                                            label: 'Nombre de Parrainages',
                                            data: [
                                                120,
                                                150,
                                                180,
                                                300,
                                                280,
                                                350,
                                                400
                                            ],
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            borderWidth: 2
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            // Graphique en barres (parrainages par mois)
                            const ctx2 = document
                                .getElementById('barChart')
                                .getContext('2d');
                            new Chart(ctx2, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        'Jan',
                                        'Fév',
                                        'Mar',
                                        'Avr',
                                        'Mai',
                                        'Juin',
                                        'Juil'
                                    ],
                                    datasets: [
                                        {
                                            label: 'Nombre de Parrainages',
                                            data: [
                                                120,
                                                150,
                                                180,
                                                300,
                                                280,
                                                350,
                                                400
                                            ],
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
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>

                        <!-- Table des Parrainages récents -->
                        <div class="mt-6">
                            <h2 class="text-xl font-bold mb-4">Parrainages récents</h2>
                            <table
                                class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
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
@endsection
