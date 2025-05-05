@extends('layouts.layout')

@section('page-title', 'Welcome')

@section('includes.header')

@section('includes.navigation')

@section('main-content')
<div class="flex-grow p-6 max-w-3xl min-w-[48rem] mx-auto rounded-2xl my-4 shadow-lg bg-slate-100 text-lg text-slate-800">
    <h2 class="text-2xl font-bold tracking-wide text-slate-800 mb-4">Welcome</h2>

    <p class="text-base mb-3">
        Thank you for visiting! This website allows you to participate in questionnaires designed to gather insights and feedback.
    </p>

    <p class="text-base mb-3">
        To get started, simply click on the <strong>Questionnaires</strong> link in the navigation menu above or click the button below. 
        You will be presented with the currently available questionnaires, each containing multiple-choice questions.
    </p>

    <p class="text-base mb-3">
        Once you have answered all the questions, please submit your responses. You will then see a confirmation message to know your answers have been recorded.
    </p>

    <p class="text-base mb-3">
        If you have an account as a questionnaire creator or admin, you can <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 underline">login</a> to manage questionnaires and view submissions.
    </p>

    <p class="text-base mb-3">
        <strong>PLEASE READ BEFORE PARTICIPATING: </strong>
        The purpose of this questionnaire is to gather data to support academic research and improve the design and functionality of online questionnaires.
        By participating, you agree for your responses to be used solely for these purposes by the questionnaire owner.
        All data collected is anonymous and will be handled securely in compliance with data protection best practices.
        Please do not provide any personal or identifying information in your responses.
    </p>
    <div class="text-center">
    <a href="/questionnaires" class="inline-block bg-blue-600 text-white text-lg font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition">Click here to participate</a>
    </div>
</div>
@endsection

@section('includes.footer')
