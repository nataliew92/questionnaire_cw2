@extends('layouts.layout')

@section('page-title', 'Admin Panel - Questionnaire Responses')

@section('includes.header')

@section('includes.navigation')

@section('main-content')

<div class="flex justify-between items-center px-5 pt-5 pb-5">
    <h2 class="text-2xl font-semibold text-slate-800">Responses for: {{ $questionnaire->title }}</h2>
    <a href="{{ route('admin.questionnaires.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg text-sm font-semibold hover:bg-gray-600 transition">
        ← Back to Questionnaires
    </a>
</div>

<!-- If there are no responses in the database -->
@if($participants->isEmpty())
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded relative mb-4">
        No responses submitted yet.
    </div>
<!-- Responses are shown here, however did not implement functionalities to separate these by participant, would have been good for future iterations --->
@else
    <div class="overflow-x-auto bg-slate-100 shadow rounded-lg p-4">
        <table class="w-full border-collapse border border-gray-300 text-slate-800">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="p-3 border border-gray-300 font-semibold">Question</th>
                    <th class="p-3 border border-gray-300 font-semibold">Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $participant)
                    <tr class="border border-gray-300">
                        <td class="p-3">
                            {{ $participant->question->question ?? 'N/A' }}
                        </td>
                        <td class="p-3">
                            {{ $participant->answer->answer ?? 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection

@section('includes.footer')
