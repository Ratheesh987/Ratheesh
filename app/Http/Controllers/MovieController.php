<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Exception;

class MovieController extends Controller
{
    public function store_videos(Request $request)
    {
        try {
            $request->validate([
                'movie_title' => 'required|string|max:255',
                'movie_file'  => 'required|mimes:mp4,avi,mkv',
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
}
