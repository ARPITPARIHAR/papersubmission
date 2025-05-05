<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function adminlogin() {

        return view('frontend.login');
    }
    public function backend_login() {
        return view('backend.login');
    }

    public function reg() {
        return view('frontend.register');
    }
    public function registerd(Request $request) {

          
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return back()->with('success', 'You are successfully registered. Login to your account.');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email =$request->email;
        $password =$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

           if (auth()->user()->user_type=='customer') {
            return redirect()->route('customer.dashboard');
           }elseif (in_array(auth()->user()->user_type,['admin','staff','author'])) {
             return redirect()->route('dashboard');
           }else{
            return back()->with('error',"your login credentials don't match an account in our system");
           }

        }else{
            return back()->with('error',"your login credentials don't match an account in our system");
        }
    }
    public function logout(){

        Auth::logout();

        if ( $user_type='admin') {
            return redirect()->route('home');

        }
    }
}
