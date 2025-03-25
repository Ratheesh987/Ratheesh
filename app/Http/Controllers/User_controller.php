<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Wishlist;

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
        $user     = auth()->user();
        $wishlist = Wishlist::where('user_id', $user->id)->get();

        $wishlist = Wishlist::join('movies', 'wishlists.video_id', '=', 'movies.id')
                            ->where('wishlists.user_id', $user->id)
                            ->get(['movies.*']);

        return view('dashboard', compact('wishlist'));
    }
    public function add_video(){
        return view('add_video');
    }
    public function all_videos(){
        $videos = Movie::all();
        return view('all_videos', compact('videos'));
    }
}
