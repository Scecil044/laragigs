<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('user.register');
    }
    // create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', Rule::unique('Users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        Auth::login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }
    // login page
    public function login(){
        return view('user.login');
    }
    // login user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required'],
            'password' => 'required',
        ]);
        if(Auth::attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'welcome back!');
        }else{
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }
    // Logout
    public function destroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout successful');
    }
}
