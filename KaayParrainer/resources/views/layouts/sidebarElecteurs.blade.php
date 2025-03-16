<aside class="w-64 bg-white dark:bg-gray-800 shadow-md h-screen p-5">
    <h5 class="text-lg font-semibold text-gray-700 dark:text-white">Menu</h5>
    <ul class="mt-4 space-y-2">
        <li>
            <a href="{{ route('profile') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">person</span>
                <span class="ml-3">Mon Profil</span>
            </a>
        </li>
        <li>
            <a href="{{ route('parrainages.index') }}" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="material-icons">how_to_vote</span>
                <span class="ml-3">Parrainages</span>
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
