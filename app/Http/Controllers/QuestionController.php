<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Examination;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function store(Request $request, Examination $examination){
        
        $validatedData = $request->validate([
            'Question' => 'nullable|array',
            'Question.*' => 'nullable',
            'type_id' => 'required'
        ]);
        // dd($validatedData['Question']);
        foreach ($validatedData['Question'] as $question_text ) {
            if($question_text !== null){
                $question = new Question();
                $question->Question = $question_text;
                $question->examinations_id = $examination->id;
                $question->type_id = $validatedData['type_id'];
                $question->save();
            }
            # code...
        }
        return back()->with('message', 'Questions added successfully');
    }
}
