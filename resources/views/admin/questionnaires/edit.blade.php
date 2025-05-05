@extends('layouts.layout')

@section('page-title', 'Edit Questionnaire')

@section('includes.header')

@section('includes.navigation')

@section('main-content')

<div class="flex justify-between items-center px-5 pt-5 pb-5">
    <h2 class="text-2xl font-semibold text-slate-800 pl-5 pt-5 pb-5">
        Editing Questionnaire ID: {{ $questionnaire->id }}
    </h2>
    <a href="{{ route('admin.questionnaires.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition">
        ← Back to Questionnaires
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Can only edit the title and description, was not able to pull from other tables to edit at this time of implementation -->
<form class="max-w-2xl mx-auto bg-slate-100 p-8 rounded-lg shadow-md space-y-6" action="{{ route('questionnaires.update', $questionnaire->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div>
        <label for="title" class="block text-slate-800 font-semibold">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $questionnaire->title) }}" required class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="description" class="block text-slate-800 font-semibold">Description:</label>
        <textarea id="description" name="description" rows="5" required class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none">{{ old('description', $questionnaire->description) }}</textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.questionnaires.index') }}" class="bg-gray-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-600 transition">
            Cancel
        </a>
        <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
            Update Questionnaire
        </button>
    </div>
</form>

@endsection

@section('includes.footer')
