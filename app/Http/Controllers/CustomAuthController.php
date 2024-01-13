<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function home(){
        return view('index');
    }

    public function index(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('message','Signed In!');
        }
        return redirect('/login')->with('message','Invalid Login. Try again!');
    }

    public function singUp(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6'
        ]);
        $data = $request->all();
        $check = $this->create($data);
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/login');
    }

    public function signout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
