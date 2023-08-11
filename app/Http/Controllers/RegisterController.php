<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


use App\Models\User;



class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index', [
      'title' => 'Register',
      'active' => 'register',
    ]);
  }

  public function store(Request $request){
    // return request()->all();    //test nilai semua request, dari method tanpa args
    // return $request->all();    //test nilai semua request, dengan pass request as args

    $validatedData = $request->validate([
      'name' => 'required|max:255',     // dengan PIPE |
      'username' => ['required', 'min:3', 'max:25', 'unique:users'],   // pakai cara ARRAY, 'unique -> mengacu models/tabel users
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:255'
    ]);

    // dd('registrasi berhasil');
    
    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = Hash::make($validatedData['password']);      // juga memakai bcrypt function

    User::create($validatedData);

    // // memberikan pesan flash/alert ke client/request bahwa proses registrasi berhasil
    // $request->session()->flash('success', 'Registrasi berhasil silahkan login');

    // sekalian memberikan pesan flash/alert ke client/request bahwa proses registrasi berhasil
    return redirect('/login')->with('success', 'Registrasi berhasil silahkan login');

  }

}
