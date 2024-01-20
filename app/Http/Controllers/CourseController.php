<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(){
        return view('admin.course.index', [
            'active' => 'course',
            'courses' => Course::all(),
        ]);
    }
}
