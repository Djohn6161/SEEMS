<?php

namespace App\Http\Controllers;

use App\Models\Choices;
use App\Models\Examination;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    //
    public function index(){
        $exams = Examination::all();
        $type = QuestionType::all();
        return view('admin.examination.index',[
            'exams' => $exams,
            'active' => 'exam',
            'Qtype' => $type,
        ]);
    }
    public function show(Examination $examination){
        // dd($examination);
        $exams = Examination::all();
        // get all the questions in this examination
        $questions = $examination->Question;
        // get all the choices available in this questions
        $questionIds = $questions->pluck('id');
        $choices = Choices::whereIn('questions_id', $questionIds)->get();
        $type = QuestionType::all();
        // dd($choices);
        return view('admin.examination.show',[
            'exams' => $exams,
            'examination_now' => $examination,
            'questions' => $questions,
            'choices' => $choices,
            'active' => 'exam',
            'type' => $type,
        ]);
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:examinations,name',
            'start_dateTime' => 'required',
            'end_dateTime' => 'nullable',
        ]);
        // dd($validatedData);
        Examination::create($validatedData);
        return redirect()->back()->with('message', 'Examination Created Successfully');
    }
}
