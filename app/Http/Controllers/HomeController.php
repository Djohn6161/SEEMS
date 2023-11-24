<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Examination;
use App\Models\Score;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role_id = auth()->user()->role;

        $redirects = [
            1 => '/admin',
            2 => '/examiners',
            3 => '/examinee',
        ];

        if (isset($redirects[$role_id])) {
            return redirect($redirects[$role_id]);
        } else {
            return redirect('/home');
        }
    }

    public function adminIndex(){
        
        $exams = Examination::all();
        return view('admin.index',[
            'exams' => $exams,
            'active' => 'dashboard'
        ]);
    }
    public function examineeIndex(){
        // dd("Examinee");
        $exams = Examination::all();
        $attempts = Score::all();
        return view('examinee.index',[
            'active' => 'exams',
            'exams' => $exams,
            'attempts' => $attempts,
        ]);
    }
}
