@extends('layouts.app')

@section('title', 'Messages Hebdomadaires')

@section('content')
<div class="container">
    <h1>Messages Hebdomadaires</h1>

    @if(isset($messageCount))
        <div class="alert alert-info">
            <p>Vous avez <strong>{{ $messageCount }}</strong> messages cette semaine.</p>
        </div>
    @else
        <div class="alert alert-warning">
            <p>Aucun message reçu cette semaine.</p>
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('candidat.dashboard') }}" class="btn btn-primary">Retour au Dashboard</a>
    </div>
</div>
@endsection
