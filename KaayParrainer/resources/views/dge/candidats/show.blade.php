@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-6 shadow-md rounded-lg text-center">
        <h2 class="text-2xl font-bold mb-4">{{ $candidat->prenom }} {{ $candidat->nom }}</h2>
        <img src="{{ asset('storage/'.$candidat->photo) }}" alt="Photo de {{ $candidat->prenom }} {{ $candidat->nom }}" class="h-32 w-32 mx-auto rounded-full mb-4">
        <p class="text-gray-600">Email: {{ $candidat->adresse_email }}</p>
        <p class="text-gray-600">Parti Politique: {{ $candidat->parti_politique }}</p>
        <p class="text-gray-600">Slogan: {{ $candidat->slogan }}</p>
        <div class="flex justify-center mt-4 space-x-2">
            @php
                $couleurs = json_decode($candidat->trois_couleurs_parti);
            @endphp
            @foreach ($couleurs as $couleur)
                <div class="h-6 w-6 rounded-full" style="background-color: {{ $couleur }};"></div>
            @endforeach
        </div>
    </div>
</div>
@endsection
