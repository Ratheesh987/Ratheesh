<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_controller extends Controller
{
    public function registration(){
        return view('registration');
    }

    public function login(){
        return view('login');
    }

    public function dashboard(){
        return view('dashboard');
    }
    public function add_video(){
        return view('add_video');
    }
}
