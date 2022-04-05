<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function mainView(){
        $films = Film::all()->reverse()->take(10);
        return view('users.main', compact('films'));
    }

    public function regView(){
        return view('users.reg');
    }

    public function regPost(Request $request){
        $request->validate([
           'login'=>'required|unique:users',
            'password'=>'required|confirmed',
        ]);
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->only('login','password'));
        return redirect()->route('auth');
    }
    public function authView(){
        return view('users.auth');
    }

    public function authPost(Request $request){
        $request->validate([
            'login'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($request->only('login','password'))){
            $request->session()->regenerate();
            return redirect()->route('/');
        } else {
            return back()->withErrors(['authError'=>'неверный логин или пароль']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }

    public function lkView()
    {
        return view('users.lk');
    }
}
