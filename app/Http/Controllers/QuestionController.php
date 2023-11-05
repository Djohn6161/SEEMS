<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choices;
use App\Models\Question;
use App\Models\Examination;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function store(Request $request, Examination $examination){
        
        $validatedData = $request->validate([
            'Question' => 'nullable|array',
            'Question.*' => 'nullable',
            'answer' => 'nullable|array',
            'answer.*' => 'nullable',
            'letter' => 'nullable|array',
            'letter.*' => 'nullable',
            'description' => 'nullable|array',
            'description.*' => 'nullable',
            'type_id' => 'required',
        ]);
        
        $i = 0;
        foreach ($validatedData['Question'] as $question_text) {
            if ($question_text !== null) {
                $question = new Question();
                $question->Question = $question_text;
                $question->examinations_id = $examination->id;
                $question->type_id = $validatedData['type_id'];
                $question->save();
        
                if ($validatedData['type_id'] != 3) {
                    $x = 0;
                    foreach ($validatedData['letter'][$i] as $key => $letter) {
                        if ($letter !== null) {
                            $choice = new Choices([
                                'questions_id' => $question->id,
                                'letter' => $letter,
                                'description' => $validatedData['description'][$i][$key],
                            ]);
        
                            $choice->save();
                            $x++;
                        }
                    }
        
                    $answerIndex = 0;
                    foreach ($validatedData['answer'] as $answer) {
                        // dd($answer);
                        if ($answer !== null) {
                            $choice = Choices::where('questions_id', $question->id)->where('letter', $answer)->first();
        
                            // Make sure the choice exists before saving the answer.
                            if ($choice) {
                                $answerModel = new Answer([
                                    'questions_id' => $question->id,
                                    'choices_id' => $choice->id,
                                ]);
                                $answerModel->save();
                            }
                        }
                        $answerIndex++;
                    }
                }
        
                $i++;
            }
        }
        
        return redirect("admin/examination/$examination->id")->with('message', 'Questions added successfully');
    }
    public function create(Request $request, Examination $examination){
        // dd($request);
        return view('admin.examination.create', [
            'numQuestion' => $request['numberOfQuestion'],
            'numChoice' => $request['numberOfChoices'],
            'questionType' => QuestionType::findOrFail($request['type_id']),
            'active' => 'exam',
            'examination' => $examination,

        ]);
        
    }
}
