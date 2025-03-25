<?php
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MovieController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('registration', [User_Controller::class, 'registration'])->name('registration');
Route::get('/', [User_Controller::class, 'login'])->name('login');
Route::post('login_submit', [RegisterController::class, 'login_submit'])->name('login_submit');
Route::post('register_new', [RegisterController::class, 'register_new'])->name('register_new');


Route::middleware('auth')->group(function () {
Route::get('dashboard', [User_Controller::class, 'dashboard'])->name('dashboard');
Route::get('add_video', [User_Controller::class, 'add_video'])->name('add_video');
Route::get('all_videos', [User_Controller::class, 'all_videos'])->name('all_videos');

Route::post('store_videos', [MovieController::class, 'store_videos'])->name('store_videos');
Route::post('add_wislist/{videoId}', [MovieController::class, 'add_wislist'])->name('add_wislist');
});
