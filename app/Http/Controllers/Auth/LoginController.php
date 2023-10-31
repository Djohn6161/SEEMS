<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $redirectPaths = [
            1 => '/admin',
            2 => '/examiners',
            3 => '/examinee',
        ];

        $role = auth()->user()->role;

        $state = auth()->user()->active;

        // dd($state);
            return $redirectPaths[$role] ?? '/home';

        
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->active === 0) {
            Auth::logout();
            return redirect('/login')->with('message', 'Your account is currently inactive'); // Redirect to an "inactive" page or wherever you want.
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
