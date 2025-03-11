@extends('layouts.app')

@section('title', 'Liste des Candidats')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Liste des Candidats</h1>

    <!-- Grille des candidats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($candidats as $candidat)
            <div class="bg-white p-6 shadow-md rounded-lg text-center">
                <img src="{{ asset('images/'.$candidat->photo) }}" alt="Photo de {{ $candidat->nomPartiPolitique }}" class="h-32 w-32 mx-auto rounded-full mb-4">

                <h2 class="text-xl font-semibold">{{ $candidat->nomPartiPolitique }}</h2>
                <p class="text-gray-600 italic">"{{ $candidat->slogan }}"</p>

                <!-- Statistiques -->
                <p class="mt-2 text-lg font-bold text-green-600">{{ $candidat->parrainages_count }} Parrainages</p>

                <!-- Bouton Voir Profil -->
                <a href="{{ route('candidats.show', $candidat->id) }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Voir Détails
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

{{--
Controller

use App\Models\Candidat;

public function index()
{
    $candidats = Candidat::withCount('parrainages')->get(); // Charge les candidats avec le nombre de parrainages
    return view('public.listeCandidats', compact('candidats'));
}

route
Route::get('/candidats', [CandidatController::class, 'index'])->name('candidats.index');
 --}}
