<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login', ['title' => 'Login']);
    }

    public function store(Request $request){
       // dd('login');

       $validated =  $request->validate([
        'email' => 'required|email',
        'password' => 'required',
       ]);
    
      //dd($validated);

      $logged = Auth::attempt($validated);
      //Se logou, redireciona.
      if ($logged) {
        return redirect()->intended('/');
      }

      return back()->with('error_login', 'Ocorreu um erro ao fazer login, tente novamente.');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }

}
