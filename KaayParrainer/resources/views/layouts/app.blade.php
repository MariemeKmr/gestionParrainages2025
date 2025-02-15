<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KaayParrainer')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md p-4">
        <div class="max-w-screen-xl mx-auto flex justify-between">
        <img src="{{ asset('images/Logo_KP.png') }}" class="h-12 w-12" alt="KaayParrainer Logo">
            <a href="#" class="text-2xl font-bold">KaayParrainer</a>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
