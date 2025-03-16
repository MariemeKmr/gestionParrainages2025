@extends('layouts.appDge')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-center">Importer le fichier des électeurs</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('electeurs.import') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Fichier CSV</label>
            <input type="file" name="file" id="file" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="checksum" class="block text-sm font-medium text-gray-700">Checksum (SHA256)</label>
            <input type="text" name="checksum" id="checksum" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Importer</button>
    </form>
</div>
@endsection
