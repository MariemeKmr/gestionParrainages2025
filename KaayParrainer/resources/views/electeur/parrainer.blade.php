@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Parrainer un Candidat</h1>

    <!-- Liste des candidats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($candidats as $candidat)
            <div class="bg-white p-6 shadow-md rounded-lg text-center">
                <img src="{{ asset('storage/'.$candidat->photo) }}" alt="Photo de {{ $candidat->prenom }} {{ $candidat->nom }}" class="h-32 w-32 mx-auto rounded-full mb-4">
                <p class="text-gray-600 mt-4">{{ $candidat->prenom }} {{ $candidat->nom }}</p>
                <h2 class="text-xl font-semibold">{{ $candidat->parti_politique }}</h2>
                <p class="text-gray-600 italic">"{{ $candidat->slogan }}"</p>

                <!-- Afficher les trois couleurs du parti politique sous forme de ronds -->
                @php
                    $couleurs = json_decode($candidat->trois_couleurs_parti);
                @endphp
                <div class="flex justify-center mt-4 space-x-2">
                    @foreach ($couleurs as $couleur)
                        <div class="h-6 w-6 rounded-full" style="background-color: {{ $couleur }};"></div>
                    @endforeach
                </div>

                <form action="{{ route('parrainage.post', ['candidatId' => $candidat->id]) }}" method="POST" onsubmit="return confirmParrainage(event, {{ $candidat->id }})">
                    @csrf
                    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Parrainer
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script>
    function confirmParrainage(event, candidatId) {
        event.preventDefault();
        if (confirm("Voulez-vous vraiment parrainer ce candidat ?")) {
            fetch(`{{ url('/parrainage/increment') }}/${candidatId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    event.target.submit();
                } else {
                    alert('Erreur lors de l\'incrémentation du parrainage.');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'incrémentation du parrainage.');
            });
        }
    }
</script>
@endsection