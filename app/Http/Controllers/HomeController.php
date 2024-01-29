<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Attempt;
use App\Models\Examination;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $averageScore = DB::table('scores')
        ->select(DB::raw('AVG(Score) as Average'))
        ->first()->Average;
        $exams = Examination::all();
        $total_examinee = count(Registration::all());
        $total_takers = Score::all()->count();
        $scores = Score::all();
        $examinees = Registration::select(DB::raw('MONTHNAME(created_at) as Month'), DB::raw('count(*) as examinee_count'))
        ->groupBy(DB::raw('MONTHNAME(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
        ->get();
        $ExamineMuni = Registration::select(DB::raw('Count(*) as Examine'), 'municipality')
        ->groupBy("municipality")->get();
        // dd($ExamineMuni);
    //     $results = Score::select('users_id', \DB::raw('MAX(Score) as max_score'), 'total_items')
    // ->groupBy('users_id')
    // ->havingRaw('max_score > total_items / 2')
    // ->get();

        // dd($results);
        $total_passers = 0;
        foreach($scores as $score){
            // dd( $score->total_items * .5);
            if($score->Score >= $score->total_items * .5){
                $total_passers++;
            }
        }
        // dd(($total_passers / $total_takers) * 100);
        if ($total_passers != 0) {
            $total_passers = ($total_passers / $total_takers) * 100;
        }else{
            $total_passers = 100;
        }
        $colors = ['#007BFF', '#28A745', '#DC3545', '#FFC107', '#17A2B8', '#343A40', '#6C757D', '#007BFF', '#28A745', '#DC3545', '#FFC107', '#17A2B8', '#343A40', '#6C757D', '#007BFF', '#28A745', '#DC3545', '#FFC107', '#17A2B8', '#343A40', '#6C757D'];

        return view('admin.index',[
            'exams' => $exams,
            'active' => 'dashboard',
            'total_examinee' => $total_examinee,
            'average_score' => $averageScore,
            'total_passed' => $total_passers,
            'examPerYear' => $examinees,
            'examPerMuni' => $ExamineMuni,
            'colors' => $colors,
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
