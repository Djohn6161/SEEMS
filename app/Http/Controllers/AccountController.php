<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Examination;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exams = Examination::all();
        $accounts = User::all();
        return view('admin.accounts.index',[
            'exams' => $exams,
            'active' => 'accounts',
            'accounts' => $accounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|max:50',
            'active' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role'] = 1;
        // dd($validatedData);
        User::create($validatedData);
        return redirect()->back()->with('message', 'User Added Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function activate(User $user){
        // dd($user);
        $user->active = !$user->active;
        $user->save();
        return back()->with('message', $user->name . ' Updated Successfully!');
    }
}
