@extends('layouts.layout')

@section('page-title', 'Login')

@section('includes.header')

@section('includes.navigation')

@section('main-content')
<div class="flex-grow flex justify-center items-center py-8">
    <div class="w-full max-w-md bg-slate-100 rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold text-center text-slate-800 mb-6">Login</h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"> 
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-slate-800">Email</label>
                <input type="email" name="email" id="email" placeholder="example@mail.com..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-slate-800">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password..." class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <div class="mt-4 text-center text-slate-600 text-sm">
            <a href="/" class="text-blue-500 hover:underline">Back to Home</a> |
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account? Register</a>
        </div>
    </div>
</div>
@endsection

@section('includes.footer')
