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
        $validator =  Validator::make($fields, [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:3']
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        } else {
            $validated = $validator->validated();
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            Auth::login($user);
            session()->regenerate();
            return $user;
        }
    }
    public function login(Request $request) {
        $fields = $request->all();
        $validator =  Validator::make($fields, [
            'email' => ['required', 'email'],
            'password' => ['required', 'max:255', 'min:3']
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        } else {
            $validated = $validator->validated();
            $user = User::where('email', $validated['email'])->first();
            if ($user && Hash::check($validated['password'], $user?->password)) {
                Auth::login($user);
                session()->regenerate();
                return $user;
            }
            return response([
                'message' => 'Invalid credentials'
            ], 404);
        }
    }
}
