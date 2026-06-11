<aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
    <h5 class="text-lg font-semibold text-gray-700 dark:text-white">
        <a href="{{ route('dashboard.dge') }}">Menu</a>
    </h5>
    <ul class="mt-4 space-y-2">
        <li>
            <a href="{{ route('candidats.index') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">group</span>
                <span class="ml-3">Gestion Candidats</span>
            </a>
        </li>
        <li>
            <a href="{{ route('listeCandidats') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">account_balance</span>
                <span class="ml-3">Partis Politiques</span>
            </a>
        </li>
        <li>
            <a href="{{ route('statistiques') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">bar_chart</span>
                <span class="ml-3">Statistiques</span>
            </a>
        </li>
        <li>
            <a href="{{ route('parrainage-period.create') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">event</span>
                <span class="ml-3">Ouverture Parrainage</span>
            </a>
        </li>
        <li>
            <a href="{{ route('electeurs.import') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">upload_file</span>
                <span class="ml-3">Import Fichier CSV</span>
            </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="material-icons">logout</span>
                    <span class="ml-3">Déconnexion</span>
                </button>
            </form>
        </li>
    </ul>
</aside>
