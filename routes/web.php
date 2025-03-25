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
Route::get('dashboard', [User_Controller::class, 'dashboard'])->name('dashboard');
Route::get('add_video', [User_Controller::class, 'add_video'])->name('add_video');

Route::post('register_new', [RegisterController::class, 'register_new'])->name('register_new');
Route::post('login_submit', [RegisterController::class, 'login_submit'])->name('login_submit');
Route::post('store_videos', [MovieController::class, 'store_videos'])->name('store_videos');

