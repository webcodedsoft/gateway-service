<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $email = 'demo@example.com';
        $password = 'demo';
        $username = 'demo_user';

        if ($request->get('email') == $email && $request->get('password') == $password) {
            $request->session()->put('user', $username);
            if ($request->session()->has('user')) {
                return response([ "status" => "success", "message" => "Login successful", "data" => session('user') ], 200);
            }
        } else {
            return response([ "status" => "success", "message" => "Email or Password Incorrect" ], 400);
        }
    }

    public function verifyToken(Request $request)
    {
        if ($request->session()->has('user')) {
            if ($request->username == session('user')) {
                return response([ "status" => "success", "message" => "User successfully verified", "data" => session('user') ], 200);
            } else {
                return response([ "status" => "success", "message" => "Unable to verified user" ], 400);
            }
        }
    }

}
