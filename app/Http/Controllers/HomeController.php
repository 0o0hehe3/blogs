<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function login()
    {
        return view('login.formLogin');
    }

    public function doLogin(Request $request)
    {
        $input = $request->all();
        $remember = ($request->has('remember')) ? true : false;

        $attempt = Auth::attempt([ 'email' => $input['email'],  'password' => $input['password'] ], $remember);
        if($attempt){
            return redirect('post');
        }
        else{
            return redirect('login')->with('message','Your email/password was correct');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function register()
    {
        return view('login.formRegister');
    }
}
