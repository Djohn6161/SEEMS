<?php

namespace App\Http\Controllers;

use App\Models\Choices;
use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    //
    public function index(){
        $exams = Examination::all();
        return view('admin.examination.index',[
            'exams' => $exams,
            'active' => 'exam'
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
        // dd($choices);
        return view('admin.examination.show',[
            'exams' => $exams,
            'examination_now' => $examination,
            'questions' => $questions,
            'choices' => $choices,
            'active' => 'exam'
        ]);
    }
}
