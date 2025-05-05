@extends('layouts.layout')

@section('page-title', 'Admin Panel - Questionnaires')

@section('includes.header')

@section('includes.navigation')

@section('main-content')
    <div class="flex justify-between items-center px-5 pt-5 pb-5">
        <h2 class="text-2xl font-semibold text-slate-800">Questionnaires</h2>
        <a href="{{ route('questionnaires.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
            Add Questionnaire
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-slate-100 shadow rounded-lg p-4">
        <table class="w-full border-collapse border border-gray-300 text-slate-800">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="p-3 border border-gray-300 font-semibold">Title</th>
                    <th class="p-3 border border-gray-300 font-semibold">Description</th>
                    <th class="p-3 border border-gray-300 font-semibold">Status</th>
                    <th class="p-3 border border-gray-300 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questionnaires as $questionnaire)
                <tr class="border border-gray-300">
                    <td class="p-3">{{ $questionnaire->title }}</td>
                    <td class="p-3">{{ $questionnaire->description }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded {{ $questionnaire->status === 'live' ? 'bg-green-200 text-green-800' : 'bg-gray-300 text-gray-800' }}">
                            {{ ucfirst($questionnaire->status) }}
                        </span>
                    <td class="p-3 flex space-x-2 justify-center">
                        <a href="{{ route('questionnaires.edit', $questionnaire->id) }}" class="bg-blue-600 text-white py-2 px-4 rounded text-sm font-semibold hover:bg-blue-700 transition">Update</a>
                        <a href="{{ route('questionnaires.responses', $questionnaire->id) }}" class="bg-slate-600 text-white py-2 px-4 rounded text-sm font-semibold hover:bg-slate-700 transition">
                            View Responses
                        </a>

                        <form action="{{ route('questionnaires.destroy', $questionnaire) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this questionnaire?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded text-sm font-semibold hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>

                        <form action="{{ route('questionnaires.toggleStatus', $questionnaire) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded text-sm font-semibold hover:bg-gray-600 transition">
                        Toggle Status
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('includes.footer')
