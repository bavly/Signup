<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{

    public  function  getdashboard()
    {
        return view('dashboard');
    }
    public  function  postSignup(Request $request)
    {
        $this ->validate($request , [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' =>'required|min:6'

        ]);

        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user ->email = $email;
        $user ->first_name = $first_name;
        $user ->password = $password;

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public  function  postSignin(Request $request)
    {
        $this ->validate($request , [
            'email' => 'required|email',
            'password' =>'required'

        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' =>$request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
}