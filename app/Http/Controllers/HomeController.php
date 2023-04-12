<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function history(){
        if(!Auth::check()){
            return redirect('/');
        }

        return view('history');

    }

    public function newtrack(){
        if(!Auth::check()){
            return redirect('/');
        }

        return view ('addnew');
    }

    public function dashboard(){
        if(!Auth::check())
        {
            return redirect('/');
        }

        return view('dashboard');
    }

    public function newuser(){
        if(Auth::check()){
            return redirect('dashboard');
        }

        return view('register');
    }
    
    public function restricted(){
        if(Auth::check()){
            return redirect('dashboard');
        }

        return redirect('/');
    }


    public function index(){
        if(Auth::check()){
            return redirect('dashboard');
        }

        return view('login');
    }

}
