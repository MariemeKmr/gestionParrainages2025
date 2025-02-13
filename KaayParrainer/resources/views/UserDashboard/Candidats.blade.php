@extends('UserDashboard.IndexDashboard')

@section('content')
{{--
@if(isset($user))
<h1 class="text-2xl font-bold">Bienvenue, {{ $user->name }}</h1>
<p>Email : {{ $user->email }}</p>
<p>Date d'inscription : {{ $user->created_at->format('d/m/Y') }}</p>
@else
<h1 class="text-2xl font-bold text-red-500">Aucun utilisateur connecté.</h1>
<p>Veuillez vous connecter pour voir votre dashboard.</p>
@endif --}}
    {{-- <h1 class="text-2xl font-bold">Bienvenue, {{ $user->name }}</h1>
    <p>Email : {{ $user->email }}</p>
    <p>Date d'inscription : {{ $user->created_at->format('d/m/Y') }}</p>--}}
@endsection
