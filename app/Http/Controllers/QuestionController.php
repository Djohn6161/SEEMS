<?php

namespace App\Http\Controllers;

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
        // dd($validatedData);
        $i = 0;
        foreach ($validatedData['Question'] as $question_text) {
            if ($question_text !== null) {
                $question = new Question();
                $question->Question = $question_text;
                $question->examinations_id = $examination->id;
                $question->type_id = $validatedData['type_id'];
                if ($validatedData['type_id'] != 3){
                $question->answer = $validatedData['answer'][$i];
                }
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
        
                    // $answerIndex = 0;
                    // dd($validatedData['answer'] );
                    // foreach ($validatedData['answer'] as $answer) {
                    //     // dd($answer);
                    //     if ($answer !== null) {
                    //         $choice = Choices::where('questions_id', $question->id)->where('letter', $answer)->first();
                    //         dd($choice);
                    //         // Make sure the choice exists before saving the answer.
                    //         if ($choice) {
                    //             $answerModel = new Answer([
                    //                 'questions_id' => $question->id,
                    //                 'choices_id' => $choice->id,
                    //             ]);
                    //             $answerModel->save();
                    //         }
                    //     }
                    //     $answerIndex++;
                    // }
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
    public function update(Request $request, Question $question){
        
        $validatedQuestionData = $request->validate([
            'Question' => 'required',
            'answer' => 'nullable',
        ]);
        $question->update($validatedQuestionData);
        $validateChoicesData = $request->validate([
            'letter' => 'nullable|array',
            'letter.*' => 'nullable',
            'description' => 'nullable|array',
            'description.*' => 'nullable',
        ]);
        if($question->type_id != 3){
            foreach ($validateChoicesData['letter'][$question->id] as $letter) {
                // dd($letter);
                $choice = Choices::where('questions_id', $question->id)->where('letter', $letter)->first();
                $choice->description = $validateChoicesData['description'][$question->id][$choice->id];
                $choice->save();
            }
        }
        
        return redirect()->back()->with('message', 'Question Updated Successfully!');
        
    }
    public function destroy(Question $question){
        // dd($question);
        $question->delete();
            
        return back()->with('message', 'Question Deleted Successfully!');
    }
}
