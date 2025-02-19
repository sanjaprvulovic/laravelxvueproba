<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    //
    public function register(){
        return Inertia::render('Register');
    }
    public function registerSubmit(Request $request){
        $validate= $request->validate([
            'name'=>'required|string|max:255|min:2',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|max:255|min:7',
        ]);
        try{
            $user= User::create([
                'name'=>$validate['name'],
                'email'=>$validate['email'],
                'password'=>$validate['password']

            ]);
            return redirect(route('loginSubmit'));
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'An error occurred during registration. Please try again later', 500]);

        }
    }

    public function login(){
        return Inertia::render('Login');
    }

    public function loginSubmit(Request $request){
        $credentials=$request->validate([
            'email'=> 'required|email|string|max:255',
            'password'=>'required',
        ]);

        if(!Auth::attempt($credentials)){
            return back()->withErrors([
                'email' => 'Invalid email or password!',
                'password' => 'Invalid email or password!',
            ]);
        }

        $user= Auth::user();

        return redirect(route('users'));


    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('register'));

    }
    
}
