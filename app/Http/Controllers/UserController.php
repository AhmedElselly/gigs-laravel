<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    // Getting the register form
    public function register(){
        return view('users.register');
    }

    // Storing the user and logging in
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Creating user
        $user = User::create($formFields);
        // Logging in
        auth()->login($user);

        return redirect('/')->with('message', 'Welcome, You are successfully logged in!');
    }
}
