<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function register(Request $request) {
        $fields = $request->all();
        $validator =  Validator::make($fields, [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:3']
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 422);
        } else {
        }
    }
}
