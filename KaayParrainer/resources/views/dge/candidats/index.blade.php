@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Gestion des Candidats</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Champ de recherche et bouton ajouter -->
    <div class="flex items-center mb-4">
        <input type="text" id="searchInput" placeholder="Rechercher un candidat..." class="w-full px-3 py-2 border border-gray-300 rounded-lg">
        <a href="{{ route('candidats.create') }}" class="ml-4 bg-blue-600 text-white px-4 py-2 rounded flex items-center hover:bg-blue-700 transition">
            <span class="material-icons">add</span>
        </a>
    </div>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nom</th>
                <th class="py-2 px-4 border-b">Prenom</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Parti</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody id="candidatTable">
            @foreach ($candidats as $candidat)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $candidat->nom }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidat->prenom }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidat->adresse_email }}</td>
                    <td class="py-2 px-4 border-b">{{ $candidat->parti_politique }}</td>
                    <td class="py-2 px-4 border-b flex space-x-2">
                        <a href="{{ route('candidats.show', $candidat->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                            <span class="material-icons">visibility</span>
                        </a>
                        <a href="{{ route('candidats.edit', $candidat->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded flex items-center">
                            <span class="material-icons">edit</span>
                        </a>
                        <form action="{{ route('candidats.destroy', $candidat->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded flex items-center">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript pour la recherche dynamique -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll('#candidatTable tr');

        rows.forEach(function(row) {
            var nom = row.cells[0].textContent.toLowerCase();
            var prenom = row.cells[1].textContent.toLowerCase();
            var email = row.cells[2].textContent.toLowerCase();
            var parti = row.cells[3].textContent.toLowerCase();

            if (nom.includes(input) || prenom.includes(input) || email.includes(input) || parti.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
