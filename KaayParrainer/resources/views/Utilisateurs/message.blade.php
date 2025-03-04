<!-- resources/views/Utilisateurs/message.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<body>

    <h1>Liste des messages</h1>

    <!-- Affichage du message de succès s'il y en a -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Formulaire pour envoyer un nouveau message -->
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" cols="50"></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Messages envoyés:</h2>
    @foreach ($messages as $message)
        <div>
            <p>{{ $message->content }}</p>
            <small>Envoyé par : {{ $message->user->name }} le {{ $message->created_at->format('d/m/Y H:i') }}</small>
        </div>
    @endforeach

</body>
</html>
