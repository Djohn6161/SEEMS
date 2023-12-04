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
            'province' => 'required|max:255',
            'municipality' => 'required|max:255',
            'barangay' => 'required|max:255',
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

        return redirect()->back()->with('message', 'Registered Successfully');

    }
    public function index(){
        $exams = Examination::all();
        $registrations = Registration::all();
        return view('admin.registration.index',[
            'exams' => $exams,
            'active' => 'registration',
            'registrations' => $registrations,
        ]);
    }
    public function update(Request $request, Registration $registration){
        // dd($registration->users_id);
        $formFields = $request->validate([
            'email' => "required|unique:users,email,{$registration->users_id}",
            'first_name' => 'required|max:50',
            'middle_name' => 'nullable|max:50',
            'last_name' => 'required|max:50',
            'extension' => 'nullable|max:5',
            'date_of_birth' => 'required|date',
            'mobile_number' => 'required|digits:11',
            'province' => 'required|max:255',
            'municipality' => 'required|max:255',
            'barangay' => 'required|max:255',
        ]);
        $user = User::find($registration->users_id);
        $user->email = $formFields['email'];
        $user->name = $formFields['first_name'] . " " . $formFields['last_name'];
        $user->save();
        $registration->update($formFields);
        // dd($program);
        // $status = $registration->email . ' Updated Successfully!';
        return back()->with('message', $registration->email . ' Updated Successfully!');
    }
    public function destroy(Registration $registration){
        // dd($registration);
            $user = User::find($registration->users_id);
            // dd($user);
            $registration->delete();

            $user->delete();
            
            return back()->with('message', 'Registration Deleted Successfully!');
    }
}
