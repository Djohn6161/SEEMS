<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Result;
use App\Models\Choices;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    //
    public function index(){
        $score = Score::all()->sortByDesc('Score');
        // dd($score);
        return view('admin.scores.index',[
            'scores' => $score,
            'active' => 'scores',
        ]);
    }
    public function review(Score $score){
        // 
        // $questions = $score->questions;
        $questions = Question::where('examinations_id', $score->examinations_id)->get();
        // dd($score->examinations_id);
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
    public function update(Request $request, Score $score){
        
        foreach($score->Results as $result){
            $request;
            $res = Result::find($result->id);
            $res->score = $request['results'][$res->id];
            // dd($res);
            $res->save();
        }
        $TotalScores = Result::select(DB::raw('SUM(score) as total'))->where('scores_id', $score->id)->first();
        // dd($TotalScores->total);
        $score->Score = $TotalScores->total;
        $score->save();
        return redirect('/admin/scores')->with('message', 'Successfully updated');
    }
    public function print(){
        $score = Score::all()->sortByDesc('Score');;
        
        return view('admin.scores.print',[
            'scores' => $score,
            'active' => 'scores prints',
        ]);
    }
    public function status(Score $score){
        $score->status = !$score->status;
        $score->save();
        return back()->with('message', ' Status Updated Successfully!');
    }
}
