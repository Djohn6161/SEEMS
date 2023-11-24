<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function index(){
        $score = Score::all();
        
        return view('admin.scores.index',[
            'scores' => $score,
            'active' => 'score',
        ]);
    }
}
