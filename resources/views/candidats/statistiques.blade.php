@extends('layouts.appCandidat')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Statistiques des Parrainages</h1>

    <!-- Section des statistiques globales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold">Nombre total de parrainages</h2>
            <p class="text-2xl font-bold">{{ $totalParrainages }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold">Taux de parrainage</h2>
            <p class="text-2xl font-bold">{{ $tauxParticipation }}%</p>
        </div>
    </div>

    <!-- Section des statistiques par candidat -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Nombre de parrainages par candidat</h2>
        <ul class="list-disc pl-5 space-y-2">
            @foreach($parrainagesParCandidat as $candidat => $nombreParrainages)
                <li><strong>{{ $candidat }} :</strong> {{ $nombreParrainages }} parrainages</li>
            @endforeach
        </ul>
    </div>

    <!-- Histogramme -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Histogramme des Parrainages</h2>
        <canvas id="parrainagesChart"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('parrainagesChart').getContext('2d');
    var parrainagesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($parrainagesParCandidat)) !!}, // Noms des candidats
            datasets: [{
                label: 'Nombre de Parrainages',
                data: {!! json_encode(array_values($parrainagesParCandidat)) !!}, // Nombre de parrainages
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection