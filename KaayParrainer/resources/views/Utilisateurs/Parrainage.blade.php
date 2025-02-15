@extends('Utilisateurs.BaseDashboard')

@section('Contenus')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Parrainer un Candidat</h1>

    <!-- Liste des candidats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($candidats as $candidat)
            <div class="bg-white p-6 shadow-md rounded-lg text-center">
                <img src="{{ asset('images/'.$candidat->photo) }}" alt="Photo de {{ $candidat->nomPartiPolitique }}" class="h-32 w-32 mx-auto rounded-full mb-4">
                <h2 class="text-xl font-semibold">{{ $candidat->nomPartiPolitique }}</h2>
                <p class="text-gray-600 italic">"{{ $candidat->slogan }}"</p>
                <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Parrainer
                </button>
            </div>
        @endforeach
    </div>
</div>

@endsection
