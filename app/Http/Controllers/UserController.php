<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Builder\Use_;

class UserController extends Controller
{

    public function getUsers() {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json(["message" => "Users  not found!"], 400);
        }
        return Inertia::render('Users', [
            'users' => $users
        ]);
    }

    public function update(){
        $user = Auth::user();
        return Inertia::render('Update', [
            'user'=>$user
        ]);
    }

    public function updateSubmit(Request $request){
        $user = User::find(Auth::id());
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $validate= $request->validate([
            'name'=>'required|string|max:255|min:2',
            'email'=>'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'=>'nullable|string|max:255|min:7|confirmed'
        ]);

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => isset($validate['password']) ? bcrypt($validate['password']) : $user->password,
        ]);
        
        return back()->with('message', 'Data updated successfully!');

    }
}
