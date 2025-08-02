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
        Auth::guard('admin')->logout();
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
            return redirect('/')->with('success', 'Welcome back, ' . $username);
        }

        return redirect()->back()->with('error', 'Invalid email or password. Please try again!');
    }

    public function createAccountView(){
        return view('login.create-new-account');
    }

    public function createNewAccount(Request $request){
        $validated = $request->validate([
            'txtName'     => 'required',
            'txtEmail'    => 'required|email|unique:users,email',
            'txtPassword' => 'required|min:8',
        ]);

        $user = new Admin();

        $user->name = $request->input('txtName','');
        $user->email = $request->input('txtEmail','');
        $user->password = Hash::make($request->input('txtPassword',''));
        $user->role = 0;
        $user->status = 0;
        $user->save();
        return redirect()->route('login.view')->with('success', 'New user created successfully.');
    }
}
