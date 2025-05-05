@extends('layouts.layout')

@section('page-title', 'Questionnaires')

@section('includes.header')

@section('includes.navigation')

@section('main-content')
<div class="flex-grow p-6 max-w-3xl min-w-[48rem] mx-auto rounded-2xl my-4 shadow-lg bg-slate-100 text-lg text-slate-800">  
    <section>
        <!-- If there are questionnaires live in the database, they will be shown here -->
        @if ($questionnaires->count())
            <form action="{{ route('responses.store') }}" method="POST">
                @csrf
                @foreach ($questionnaires as $questionnaire)
                    <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">
                    <h1 class="text-2xl font-bold mb-2">{{ $questionnaire->title }}</h1>
                    <p class="mb-6">{{ $questionnaire->description }}</p>
                    @foreach ($questions as $question)
                        @if ($question->questionnaire_id === $questionnaire->id)
                            <div class="mb-4">
                                <h2 class="font-semibold">{{ $question->question }}</h2>

                                <div class="ml-4">
                                    @foreach ($answers->where('question_id', $question->id) as $answer)
                                        <label class="block mb-1">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" required>
                                            {{ $answer->answer }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Submit
                </button>
            </form>
        <!-- If there are no current questionnaires live/created -->
        @else
            <p>No questionnaires are currently available</p>
        @endif        
    </section>
</div>
@endsection

@section('includes.footer')
