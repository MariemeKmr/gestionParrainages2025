@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Verify Authentication Code</h2>
        <p class="text-gray-600 text-center mb-4">Please enter the authentication code sent to your email.</p>

        <form action="{{ route('verify.auth.code') }}" method="POST" class="mt-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mt-3">
                <label for="auth_code" class="block text-sm font-medium text-gray-700">Authentication Code</label>
                <input type="text" name="auth_code" id="auth_code" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Verify
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
