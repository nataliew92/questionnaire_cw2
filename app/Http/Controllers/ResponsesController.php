<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ResponsesController extends Controller
{
    public function store(Request $request)
    {
        $questionnaireId = $request->input('questionnaire_id');
        $answers = $request->input('answers');

        foreach ($answers as $questionId => $answerId) {
            Participant::create([
                'questionnaire_id' => $questionnaireId,
                'question_id' => $questionId,
                'answer_id' => $answerId
            ]);
        }

        return redirect('/thankyou')->with('success', 'Thank you for submitting your answers!');
    }
}