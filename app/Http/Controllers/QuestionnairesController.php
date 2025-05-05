<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Answer;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Getting all the questionnaires unless they are not set to 'live'
        $questionnaires = Questionnaire::where('status', 'live')->get();
        $questions = Question::all();
        $answers = Answer::all();

        return view('questionnaires', compact('questionnaires', 'questions', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
