<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Examination;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|unique:users,email',
            'first_name' => 'required|max:50',
            'middle_name' => 'nullable|max:50',
            'last_name' => 'required|max:50',
            'extension' => 'nullable|max:5',
            'date_of_birth' => 'required|date',
            'mobile_number' => 'required|digits:11',
        ]);
        $randomPassword = rand(100000, 999999);
        $validatedData['password'] = $randomPassword;
        
        // dd($validatedData['email']);

        $user = new User();
        $user->name = $validatedData['first_name'] . " " . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->role = 2;
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        $validatedData['users_id'] = $user->id;
        $user = Registration::create($validatedData);

        return redirect()->back()->with('message', 'You have been registered for the examination');

    }
    public function index(){
        $exams = Examination::all();
        return view('admin.registration.index',[
            'exams' => $exams,
            'active' => 'registration'
        ]);
    }
}
