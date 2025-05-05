<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Participant;
use App\Http\Requests\QuestionnaireRequest;

class AdminQuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();
        return view('admin.questionnaires.show', ['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionnaireRequest $request)
    {
        $validatedData = $request->validated();

        $questionnaire = Questionnaire::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            //'status' => 'development'
        ]);

        if (!empty($validatedData['questions'])) {
            foreach ($validatedData['questions'] as $qData) {
                if (!empty($qData['question'])) {
                    $question = Question::create([
                        'questionnaire_id' => $questionnaire->id,
                        'question' => $qData['question']
                    ]);

                    if (!empty($qData['answers'])) {
                        foreach ($qData['answers'] as $answerText) {
                            if (!empty($answerText)) {
                                Answer::create([
                                    'question_id' => $question->id,
                                    'answer' => $answerText
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('questionnaires.create')->with('success', 'Questionnaire and all questions/answers added successfully!');
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
    public function edit(Questionnaire $questionnaire)
    {
        return view('admin.questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->validated());
        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete(); // Removes the questionnaire from the database
        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire deleted successfully.');
    }

    /**
     * Toggles the status into live or development.
     */
    public function toggleStatus(Questionnaire $questionnaire)
    {
        $questionnaire->status = $questionnaire->status === 'live' ? 'development' : 'live';
        $questionnaire->save();
        return redirect()->route('admin.questionnaires.index')->with('success', 'Questionnaire status updated successfully.');
    }

    public function responses(Questionnaire $questionnaire)
    {
        $participants = Participant::where('questionnaire_id', $questionnaire->id)->get();
        $questions = Question::where('questionnaire_id', $questionnaire->id)->get();
        $answers = Answer::all();
        return view('admin.questionnaires.responses', compact('questionnaire', 'participants', 'questions', 'answers'));
    }
    
}
