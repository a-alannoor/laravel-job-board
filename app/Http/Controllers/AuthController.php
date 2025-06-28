<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // showLoginForm, login, showSignupForm, signup, logout
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        if(auth()->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/');
        }
        
        return back()->withErrors([
            'email'=>'The provided credentials donnot match our records'
        ]);
    }

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        
        $user->save();

        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
