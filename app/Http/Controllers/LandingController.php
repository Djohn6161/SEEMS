<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {
        return view('index',[
            'courses' => Course::all(),
        ]);
    }
}
