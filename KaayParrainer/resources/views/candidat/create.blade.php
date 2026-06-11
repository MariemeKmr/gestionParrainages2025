@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-2">
    <h2 class="text-2xl font-bold mb-4 text-center">Ajouter un candidat</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidats.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input type="text" name="prenom" id="prenom" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="adresse_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="adresse_email" id="adresse_email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="numero_telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="number" name="numero_telephone" id="numero_telephone" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="parti_politique" class="block text-sm font-medium text-gray-700">Parti Politique</label>
            <input type="text" name="parti_politique" id="parti_politique" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="slogan" class="block text-sm font-medium text-gray-700">Slogan</label>
            <input type="text" name="slogan" id="slogan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" id="photo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Couleurs</label>
            <div class="flex space-x-4 mt-1">
                <input type="color" name="couleur1" id="couleur1" class="h-10 w-10 p-0 border-none rounded-full">
                <input type="color" name="couleur2" id="couleur2" class="h-10 w-10 p-0 border-none rounded-full">
                <input type="color" name="couleur3" id="couleur3" class="h-10 w-10 p-0 border-none rounded-full">
            </div>
        </div>
        <div class="mb-4">
            <label for="url_info" class="block text-sm font-medium text-gray-700">URL Infos</label>
            <input type="text" name="url_info" id="url_info" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Ajouter</button>
    </form>
</div>
@endsection
