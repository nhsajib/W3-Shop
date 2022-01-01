<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('shop.auth.login-register');
    }

    public function login(Request $request){

        $request->validate([
            'user_id'   => 'required',
            'password'   => 'required',
        ]);

        if (Auth::attempt($request->only('user_id', 'password'))) {
            return redirect('/');
        }
        
        return redirect()->route('login')->with('message', 'Incorrect username or password.');
    }

    public function registerForm(){
        return view('shop.auth.login-register');
    }

    public function register(Request $request){

        $request->validate([
            'name'  => "required|max:32",
            'user_id'  => "required|max:32",
            'password'  => "required|min:8|max:156|confirmed",
        ],
        [
            'user_id.required' => 'The mobile field is required.',
        ]);

        $user = Customer::create([
            'name'  => $request->name,
            'user_id'  => $request->user_id,
            'password'  => Hash::make($request->password),
        ]);

        if($user){
            return 'Account register Successfull.';
        }

    }
}
