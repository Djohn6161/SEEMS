<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'psa_file' => 'required|mimes:png,jpeg,jpg',
            'picture' => 'required|mimes:png,jpeg,jpg',
            'courses_id' => 'required',
        ]);
        // dd($validatedData['psa_file']);
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
        if ($request->hasFile('psa_file')) {
            $validatedData['psa_file'] = $request->file('psa_file')->store('PSA', 'public');
        }
        if ($request->hasFile('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('picture2X2', 'public');
        }
        $user = Registration::create($validatedData);

        return redirect()->back()->with('message', 'Registered Successfully');

    }
    public function storeExaminee(Request $request){
        // dd($request);
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
            'psa_file' => 'required|mimes:png,jpeg,jpg',
            'picture' => 'required|mimes:png,jpeg,jpg',
            'courses_id' => 'required',
        ]);
        // dd($validatedData['psa_file']);
        $randomPassword = rand(1000, 9999);
        $validatedData['password'] = $randomPassword;
        
        // dd($validatedData['email']);

        $user = new User();
        $user->name = $validatedData['first_name'] . " " . $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->role = 2;
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        $validatedData['users_id'] = $user->id;
        if ($request->hasFile('psa_file')) {
            $validatedData['psa_file'] = $request->file('psa_file')->store('PSA', 'public');
        }
        if ($request->hasFile('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('picture2X2', 'public');
        }
        $user = Registration::create($validatedData);

        return view('congratulations')->with('message', 'Registered Successfully');

    }
    public function index(){
        $exams = Examination::all();
        $registrations = Registration::all();
        return view('admin.registration.index',[
            'exams' => $exams,
            'active' => 'registration',
            'registrations' => $registrations,
            'courses' => Course::all(),
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
            'psa_file' => 'mimes:png,jpeg,jpg',
            'picture' => 'mimes:png,jpeg,jpg',
            'courses_id' => 'required',
        ]);
        $user = User::find($registration->users_id);
        $user->email = $formFields['email'];
        $user->name = $formFields['first_name'] . " " . $formFields['last_name'];
        $user->save();
        if ($request->has('psa_file')) {
            if ($registration->psa_file !== null) {
                if (Storage::disk('public')->exists($registration->psa_file)) {
                    // dd("Thesis is found: " . $registration->psa_file);
                    Storage::disk('public')->delete($registration->psa_file);
                }
            }
            if ($request->hasFile('psa_file')) {
                $formFields['psa_file'] = $request->file('psa_file')->store('PSA', 'public');
            }
        }
        if ($request->has('picture')) {
            if ($registration->picture !== null) {
                if (Storage::disk('public')->exists($registration->picture)) {
                    // dd("Thesis is found: " . $registration->picture);
                    Storage::disk('public')->delete($registration->picture);
                }
            }
            if ($request->hasFile('picture')) {
                $formFields['picture'] = $request->file('picture')->store('PSA', 'public');
            }
        }
        $registration->update($formFields);
        // dd($program);
        // $status = $registration->email . ' Updated Successfully!';
        return back()->with('message', $registration->email . ' Updated Successfully!');
    }
    public function destroy(Registration $registration){
        // dd($registration);
            $user = User::find($registration->users_id);
            // dd($user);
            if ($registration->psa_file !== null) {
                if (Storage::disk('public')->exists($registration->psa_file)) {
                    // dd("Thesis is found: " . $thesis->file);
                    Storage::disk('public')->delete($registration->psa_file);
                }
            }
            if ($registration->picture !== null) {
                if (Storage::disk('public')->exists($registration->picture)) {
                    // dd("Thesis is found: " . $thesis->file);
                    Storage::disk('public')->delete($registration->picture);
                }
            }
            $registration->delete();

            $user->delete();
            
            return back()->with('message', 'Registration Deleted Successfully!');
    }
    public function print(){
        $exams = Examination::all();
        $registrations = Registration::all();
        return view('admin.registration.print',[
            'exams' => $exams,
            'active' => 'printRegistration',
            'registrations' => $registrations,
            'courses' => Course::all(),
        ]);
    }
}
