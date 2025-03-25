<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Wishlist;

use Exception;

class MovieController extends Controller
{
    public function store_videos(Request $request)
    {
        try {
            $request->validate([
                'movie_title' => 'required|string|max:255',
                'movie_file'  => 'required|mimes:mp4,avi,mkv|max:512000',
            ]);

            $movieFile     = $request->file('movie_file');
            $timestamp     = now()->timestamp;
            $movieName     = $timestamp . '_' . $movieFile->getClientOriginalName();
            $movieFilePath = 'assets/images/videos/' . $movieName;
            $movieFile->move(public_path('assets/images/videos'), $movieName);

            Movie::create([
                'movie_title' => $request->movie_title,
                'movie_file'  => $movieFilePath,
            ]);

            return redirect()->back()->with('successmessage', 'Video added successfully!');
        } catch (Exception $e) {
         
            return redirect()->back()->with('errormessage', 'There was an error while adding the video. Please try again.');
        }
    }

    public function add_wislist($videoId)
    {
        try {
            $video = Movie::findOrFail($videoId);

            $wishlist              = new Wishlist();
            $wishlist->user_id     = auth()->user()->id;
            $wishlist->movie_title = $video->movie_title;
            $wishlist->video_id    = $video->id;
            $wishlist->save();

            return redirect()->back()->with('successmessage', 'Video added to wishlist!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errormessage', 'Error adding video to wishlist. Please try again.');
        }
    }
}
