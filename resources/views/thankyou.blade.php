@extends('layouts.layout')

@section('page-title', 'Thank You')

@section('includes.header')

@section('includes.navigation')

@section('main-content')
<div class="flex-grow p-6 max-w-3xl min-w-[48rem] mx-auto rounded-2xl my-4 shadow-lg bg-slate-100 text-lg text-slate-800 text-center">  
    <h1 class="text-3xl font-bold mb-4">Thank You!</h1>
    <p>We appreciate you taking the time to complete the questionnaire.</p>

    <a href="/" class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Return to Home
    </a>
</div>
@endsection

@section('includes.footer')
