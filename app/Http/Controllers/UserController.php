<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt([
            'name' => $fields['name'],
            'password' => $fields['password']
        ])) {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            session(['email' => $request->email]);
            return redirect('/recover');
        } else {
            return back()->withErrors(['email' => 'The provided email does not exist in our database.']);
        }
    }

    public function recoverForm()
    {
        $email = session('email');
        if (!$email) {
            return back()->withErrors(['error' => 'Email session expired or not found. Please try again.']);
        }
        return view('auth.recover', ['email' => $email]);
    }

    public function recover(Request $request)
    {
        $email = session('email');
        if (!$email) {
            return back()->withErrors(['error' => 'Email session expired or not found. Please try again.']);
        }

        $request->validate([
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        if (!$email) {
            return back()->withErrors(['error' => 'Email session expired or not found. Please try again.']);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['id' => 'User not found.' . $email]);
        }

        $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->forget('email');

        return redirect('/login')->with('success', 'Your password has been updated successfully. Please login again.');
    }
}
