<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  public function index()
  {
    return view('login.index', [
      'title' => 'Login',
      'active' => 'login',
    ]);
  }

  // MANUAL AUTH, versi best practice nya adalah pakai JETSTREAM atau BREEZE (laravel packages ecosystem)
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email:dns',
      'password' => 'required'
    ]);

    // dd('berhasil login');
    // dd($credentials);


    if(Auth::attempt($credentials)){
      // you should regenerate the user's session to prevent SESSION FIXATION attacks (https://laravel.com/docs/9.x/session#session-fixation)
      // session fixation ini rawan digunakan hacker untuk melakukan brute force attack dgn session yg sama berulang kali
      $request->session()->regenerate();

      // Redirect Intended: redirects the user to where they were originally going
      return redirect()->intended('/dashboard');

      // Redirect To: Redirect the user to the page **YOU** specify them to go.

    }

    return redirect()->back()->with('loginError', 'Login gagal!');

  }

  public function logout()
  {
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();
    // request()->session()->regenerate();    // ga tau kenapa ga pakai regenerate() saja

    return redirect('/');
    
  }
}
