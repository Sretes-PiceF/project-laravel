<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login ()
{
    view('login');
}
public function postLogin (LoginRequest $request)
    {
        $validated = $request->validated();
        $username = $validated['username'];
        $password = $validated['password'];

        if ($username && $password){
            echo "Login masuk bos que";
        }
        else{
            return back()->withErrors($validated)->withInput();
        }
}
}
