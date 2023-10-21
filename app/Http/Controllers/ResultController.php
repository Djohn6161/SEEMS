<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //
    public function index(){
        $exams = Examination::all();
        return view('admin.scores.index',[
            'exams' => $exams
        ]);
    }
}
