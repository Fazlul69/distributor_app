<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard.view'));
        }
        else{
          return back()->with('error','Wrong Login Details');
        }

        return redirect('loginFail')->with('error', 'Oppes! You have entered invalid credentials');
    }
   
    public function logout()
    {
      Auth::logout();

      return redirect(route('mainView'));
    }
}
