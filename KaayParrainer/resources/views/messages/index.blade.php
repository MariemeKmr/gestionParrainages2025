<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<body>
    <h1>Messages</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                <strong>{{ $message->subject }}</strong> - {{ $message->content }} (Status: {{ $message->status }})
            </li>
        @endforeach
    </ul>

    <!-- Formulaire pour envoyer un message -->
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>
        <label for="content">Content</label>
        <textarea name="content" id="content" required></textarea>
        <label for="receiver_id">Receiver</label>
        <input type="number" name="receiver_id" id="receiver_id" required>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
