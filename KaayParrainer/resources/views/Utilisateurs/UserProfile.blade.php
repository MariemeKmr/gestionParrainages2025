@extends('Utilisateurs.BaseDashboard')

@section('Contenus')

    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Profil Utilisateur</h1>

        <!-- Carte Profil -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center space-x-4">
                <img class="w-24 h-24 rounded-full" src="{{ asset('images/userImage.jpg') }}" alt="Avatar">
                <div>
                    <h2 class="text-xl font-semibold">Nom Utilisateur</h2>
                    <p class="text-gray-600">nom.utilisateur@email.com</p>
                    <button class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Modifier photo de profil</button>
                </div>
            </div>
        </div>

        <!-- Formulaire de modification -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Modifier les informations</h2>
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">E-mail</label>
                        <input type="email" class="w-full p-2 border rounded-lg" value="nmaxwell@mail.com">
                    </div>
                    <div>
                        <label class="block text-gray-700">Téléphone</label>
                        <input type="text" class="w-full p-2 border rounded-lg" value="+221 77 123 45 67">
                    </div>
                    <div>
                        <label class="block text-gray-700">Mot de passe</label>
                        <input type="password" class="w-full p-2 border rounded-lg" placeholder="••••••">
                    </div>
                    <div>
                        <label class="block text-gray-700">Confirmer mot de passe</label>
                        <input type="password" class="w-full p-2 border rounded-lg" placeholder="••••••">
                    </div>
                </div>
                <button type="submit" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-lg">Enregistrer</button>
            </form>
        </div>
    </main>

@endsection
