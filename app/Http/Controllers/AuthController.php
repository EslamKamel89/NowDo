<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function register(Request $request) {
        $fields = $request->all();
        $validated =  $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:3']
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        session()->regenerate();
        return redirect()->back()->with(['success' => 'Your account is created successfully']);
    }
    public function login(Request $request) {
        $fields = $request->all();
        $validated =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'max:255', 'min:3']
        ]);
        $user = User::where('email', $validated['email'])->first();
        if ($user && Hash::check($validated['password'], $user?->password)) {
            Auth::login($user);
            session()->regenerate();
            return redirect()->back()->with(['success' => 'You logged in successfully']);
        }
        return redirect()->route('login')
            ->with(['error' => 'Invalid Credentials']);
    }
}
