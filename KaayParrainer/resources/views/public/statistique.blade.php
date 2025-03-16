@if (Auth::user()->role === 'agentdge')
    @extends('layouts.appDge')
@elseif (Auth::user()->role === 'candidat')
    @extends('layouts.appCandidat')
@elseif (Auth::user()->role === 'electeur')
    @extends('layouts.appElecteur')
@else
    @extends('layouts.app')
@endif

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Statistiques Générales</h1>

    <!-- Statistiques Globales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Électeurs</h2>
            <p class="text-2xl font-bold">{{ $totalElecteurs }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Parrainages</h2>
            <p class="text-2xl font-bold">{{ $totalParrainages }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Taux de Participation</h2>
            <p class="text-2xl font-bold">{{ number_format($tauxParticipation, 2) }}%</p>
        </div>
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Évolution des Parrainages par Parti Politique</h2>
        <canvas id="chartStat"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartStat').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Parrainages par Parti Politique',
                    data: @json($parrainagesData),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
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
</div>
@endsection
