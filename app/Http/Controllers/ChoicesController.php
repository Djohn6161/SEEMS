<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ChoicesController extends Controller
{
    //
    public function store(Request $request, Question $question){
        dd($request);
    }
}
