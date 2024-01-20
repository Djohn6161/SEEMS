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
    public function store(Request $request){
       
        $validatedData = $request->validate([
            'name' => 'required|unique:courses,name',
            'acrocode' => 'required|unique:courses,acrocode',
        ]);
        // dd($validatedData);

        Course::create($validatedData);
        return redirect()->back()->with('Message', 'Course created Successfully');
    }
    public function update(Request $request, Course $course){
        $validatedData = $request->validate([
            'name' => "required|unique:courses,name,{$course->id}",
            'acrocode' => "required|unique:courses,acrocode,{$course->id}",
        ]);
        $course->update($validatedData);
        return back()->with('Message', $course->name . ' Course updated Successfully');
    }
    public function destroy(Course $course){
        // dd($course);
        $course->delete();
        return back()->with('message', 'Course Deleted Successfully!');
    }
}
