<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;
class RegisterController extends Controller
{
    public function register_new(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $hashedPassword = Hash::make($request->password); 

    try {
        User::create([
            'user_name' => $request->name,
            'email'     => $request->email,
            'password'  => $hashedPassword,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
        return redirect()->back()
                         ->withErrors(['general' => 'An error occurred, please try again later.'])
                         ->withInput();
    }
}

public function login_submit(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    try {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Email not found. Please register.'])->withInput();
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials.'])->withInput();
        }
    } catch (Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again later.'])->withInput();
    }
}
}
