<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Choices;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function index(){
        $score = Score::all();
        
        return view('admin.scores.index',[
            'scores' => $score,
            'active' => 'scores',
        ]);
    }
    public function review(Score $score){
        $questions = $score->questions;
        $type = QuestionType::all();
        $questionIds = $questions->pluck('id');
        $choices = Choices::whereIn('questions_id', $questionIds)->get();
        // dd($choices);
        return view('admin.scores.review',[
            'score' => $score,
            'active' => 'scores',
            'questions' => $questions,
            'choices' => $choices,
            'type' => $type
        ]);
        // $exams = Examination::all();
        // // get all the questions in this examination
        // $questions = $examination->Question;
        // // get all the choices available in this questions
        // $questionIds = $questions->pluck('id');
        // $choices = Choices::whereIn('questions_id', $questionIds)->get();
        // $type = QuestionType::all();
        // // dd($choices);
        // return view('admin.examination.show',[
        //     'exams' => $exams,
        //     'examination_now' => $examination,
        //     'questions' => $questions,
        //     'choices' => $choices,
        //     'active' => 'exam',
        //     'type' => $type,
        // ]);
    }
}
