<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('sessions/create');
    }

    public function store()
    {
        //Validate the form
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Create and save the user
        $user = User::create(request(['name','email','password']));

        //Sign them in
        auth()->login($user);

        //Redirect to the home page
        return redirect()->home();

    }
}
