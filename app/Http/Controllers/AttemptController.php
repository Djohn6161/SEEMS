<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Score;
use App\Models\Result;
use App\Models\Attempt;
use App\Models\Choices;
use App\Models\Examination;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttemptController extends Controller
{
    //
    public function attempt(Examination $examination, $attempt){
        // dd($examination);
        
        $exams = Examination::all();
        // get all the questions in this examination
        $questions = $examination->Question->shuffle();
        // get all the choices available in this questions
        $questionIds = $questions->pluck('id');
        $choices = Choices::whereIn('questions_id', $questionIds)->get();
        $type = QuestionType::all();
        $currentDateTime = new DateTime();
        $duration = $examination->duration;
        list($hours, $minutes, $seconds) = explode(':', $duration);
        $totalDurationSeconds = $hours * 3600 + $minutes * 60 + $seconds;
        $deadline = clone $currentDateTime;
        $deadline->add(new DateInterval('PT' . $totalDurationSeconds . 'S'));
        $deadlineFormatted = $deadline->format('Y-m-d H:i:s');
        // dd($deadlineFormatted);
        // dd($examination);
        return view('examinee.takeExamination',[
            'exams' => $exams,
            'examination_now' => $examination,
            'questions' => $questions,
            'choices' => $choices,
            'active' => 'exam',
            'type' => $type,
            'attempt' => $attempt,
            'deadline' => $deadlineFormatted
        ]);
    }
    public function submit(Examination $examination, $attempt, Request $request){
        // dd($attempt);
        // $quiz = request(['quiz_id'])['quiz_id'];
        $score= 0;
        $data = $request->all();
        $scoring = new Score();
        $scoring->users_id = auth()->user()->id;
        $scoring->examinations_id = $examination->id;
        $scoring->score = $score;
        $scoring->total_items = count($examination->question);
        // dd($scoring->total_items);
        
        $scoring->save();
                // dd($results);
        foreach ( $request->get('question_id') as $question) {
            // dd($data);
            if(isset($request->get('choice')[$question])){
                Result::create([
                    'users_id' => auth()->id(),
                    'scores_id' => $scoring->id,
                    'questions_id' => $question,
                    'examinations_id' => $examination->id,
                    'answer' => $request->get('choice')[$question],
                    'attempt' => $attempt,
                ]);
            }else{
                Result::create([
                    'users_id' => auth()->id(),
                    'scores_id' => $scoring->id,
                    'questions_id' => $question,
                    'examinations_id' => $examination->id,
                    'answer' => 0,
                    'attempt' => $attempt,
                ]);
            }
        }
        $results = DB::table('results')
                // ->join('choices', 'choices_id', '=', 'choices.id')
                ->join('questions', 'results.questions_id', '=', 'questions.id')
                ->join('examinations', 'results.examinations_id', '=', 'examinations.id')
                ->where('users_id', auth()->id())
                ->where('results.scores_id', $scoring->id)
                ->where('examinations.id', $examination->id)
                ->where('attempt', $attempt)
                ->select('results.answer as ans', 'questions.answer as corAns', 'results.id')
                ->get();

            // dd($results);
        foreach ($results as $result)
        if ($result->ans == $result->corAns){
            $score++;
            $updRes = Result::find($result->id);
            $updRes->score = 1;
            
            $updRes->save();

        }
        $scoring->score = $score;
        if($scoring->score >= $scoring->total_items * .5){
            $scoring->status = true;
        }
        
        $scoring->save();
        // dd($score);
        return redirect('/examinee');
    }
}
