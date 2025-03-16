@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Tableau de bord DGE</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
        <div class="bg-white p-6 shadow-md rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-4 text-blue-500">Gestion Candidats</h3>
            <p class="text-gray-600">Vous pouvez gérer les candidats, ajouter de nouveaux candidats, modifier les informations des candidats existants et supprimer des candidats.</p>
        </div>
        <div class="bg-white p-6 shadow-md rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-4 text-blue-500">Partis Politiques</h3>
            <p class="text-gray-600">Vous pouvez voir les differents partis politiques, ajouter de nouveaux partis, present sur la plateforme.</p>
        </div>
        <div class="bg-white p-6 shadow-md rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-4 text-blue-500">Import Fichier CSV</h3>
            <p class="text-gray-600">Vous pouvez importer des fichiers CSV contenant des informations sur les électeurs present dans le fichier electoral.</p>
        </div>
        <div class="bg-white p-6 shadow-md rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-4 text-blue-500">Statistiques</h3>
            <p class="text-gray-600">Vous pouvez consulter les statistiques des parrainages, des candidats et des électeurs.</p>
        </div>
        <div class="bg-white p-6 shadow-md rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-4 text-blue-500">Ouverture Parrainage</h3>
            <p class="text-gray-600">Vous pouvez ouvrir et gérer les périodes de parrainage pour les élections.</p>
        </div>
    </div>
</div>
@endsection
