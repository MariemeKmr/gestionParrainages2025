@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Connexion</h2>
        <p class="text-gray-600 text-center mb-4">Veuillez entrer vos informations pour vous connecter.</p>

        <form action="{{ route('login') }}" method="POST" class="mt-4">
            @csrf

            <!-- Sélection du type d'utilisateur -->
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700">Type d'utilisateur</label>
                <select name="user_type" id="user_type" onchange="toggleLoginFields()" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                    <option value="electeur">Électeur</option>
                    <option value="candidat">Candidat</option>
                </select>
            </div>

            <!-- Champs pour les électeurs -->
            <div id="electeur_fields">
                <div class="mt-3">
                    <label for="numero_carte_electeur" class="block text-sm font-medium text-gray-700">Numéro de Carte d'Électeur</label>
                    <input type="text" name="numero_carte_electeur" id="numero_carte_electeur" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>
                <div class="mt-3">
                    <label for="numero_carte_identite" class="block text-sm font-medium text-gray-700">Numéro de Carte d'Identité Nationale</label>
                    <input type="text" name="numero_carte_identite" id="numero_carte_identite" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>
                <div class="mt-3">
                    <label for="code_auth" class="block text-sm font-medium text-gray-700">Code d'Authentification</label>
                    <input type="text" name="code_auth" id="code_auth" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>
            </div>

            <!-- Champs pour les candidats (cachés par défaut) -->
            <div id="candidat_fields" style="display: none;">
                <div class="mt-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                    @extends('layouts.app')

                    @section('content')
                    <div class="flex justify-center items-center h-screen bg-gray-100">
                        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
                            <h2 class="text-2xl font-bold text-center text-gray-800">Connexion</h2>
                            <p class="text-gray-600 text-center mb-4">Veuillez entrer vos informations pour vous connecter.</p>

                            <form action="{{ route('login.post') }}" method="POST" class="mt-4">
                                @csrf
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                </div>
                                <div class="mt-3">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                    <input type="password" name="password" id="password" required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                                </div>
                                <div class="mt-6">
                                    <button type="submit"
                                            class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                        Se connecter
                                    </button>
                                </div>
                            </form>

                            <p class="mt-4 text-sm text-center">Pas encore inscrit ? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Créer un compte</a></p>
                        </div>
                    </div>
                    @endsection                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
                </div>
                <div class="mt-3">
                    <label for="code_auth_candidat" class="block text-sm font-medium text-gray-700">Code d'Authentification</label>
                    <input type="text" name="code_auth_candidat" id="code_auth_candidat"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                    Se connecter
                </button>
            </div>
        </form>

        <p class="mt-4 text-sm text-center">Pas encore inscrit ? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Créer un compte</a></p>
    </div>
</div>

<script>
    function toggleLoginFields() {
        var userType = document.getElementById("user_type").value;
        document.getElementById("electeur_fields").style.display = userType === "electeur" ? "block" : "none";
        document.getElementById("candidat_fields").style.display = userType === "candidat" ? "block" : "none";
    }
</script>
@endsection
