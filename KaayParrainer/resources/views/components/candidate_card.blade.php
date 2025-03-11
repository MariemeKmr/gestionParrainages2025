@extends('layouts.app')

@section('title', 'Liste des Candidats')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Liste des Candidats</h1>

    <!-- Grille des candidats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($candidats as $candidat)
            @include('components.candidate_card', ['candidat' => $candidat])
        @endforeach
    </div>

</div>
@endsection
