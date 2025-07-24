<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function loginView(){
        return view('login.login');
    }

    public function userLogin(Request $request){
        $request->validate([
            'txtUsername' => 'required|email',
            'txtPassword' => 'required',
        ]);

        $credentials = [
            'email' => $request->txtUsername,
            'password' => $request->txtPassword,
            'status' => 1,
        ];

        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            $branch = Auth::guard('admin')->user()->branch;
            return redirect('/')->with('success', 'Welcome back, ' . $username);
        }

        return redirect()->back()->with('error', 'Invalid email or password. Please try again!');
    }
}
