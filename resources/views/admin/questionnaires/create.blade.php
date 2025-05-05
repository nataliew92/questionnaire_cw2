@extends('layouts.layout')

@section('page-title', 'Create Questionnaire')

@section('includes.header')

@section('includes.navigation')

@section('main-content')

<div class="flex justify-between items-center px-5 pt-5 pb-5">
    <h2 class="text-2xl font-semibold text-slate-800 pl-5 pt-5 pb-5">Create a new Questionnaire</h2>
        <a href="{{ route('admin.questionnaires.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition">
            ← Back to Questionnaires
        </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif

<form class="max-w-2xl mx-auto bg-slate-100 p-8 rounded-lg shadow-md space-y-6" action="{{ route('questionnaires.store') }}" method="POST">
    @csrf

    <div>
        <label for="title" class="block text-slate-800 font-semibold">Title:</label>
        <input type="text" id="title" name="title" required class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter a title...">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="description" class="block text-slate-800 font-semibold">Description:</label>
        <textarea id="description" name="description" rows="5" required class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none" placeholder="Enter a description..."></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @for ($i = 0; $i < 5; $i++)
        <div class="border rounded-lg p-4 mb-4 bg-white">
            <label class="block text-slate-800 font-semibold">Question {{ $i + 1 }}:</label>
            <input type="text" name="questions[{{ $i }}][question]" class="w-full px-4 py-2 border rounded-lg mb-3" placeholder="Enter a question...">
            <div class="ml-4">
                @for ($j = 0; $j < 4; $j++)
                    <input type="text" name="questions[{{ $i }}][answers][{{ $j }}]" placeholder="Answer option {{ $j + 1 }}" class="w-full px-4 py-2 border rounded-lg mb-2">
                @endfor
            </div>
        </div>
    @endfor

    <div class="flex justify-end space-x-2">
        <a href="{{ route('admin.questionnaires.index') }}" class="bg-gray-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-600 transition">
            Cancel
        </a>
        <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
            Add Entire Questionnaire
        </button>
    </div>
</form>

@endsection

@section('includes.footer')
