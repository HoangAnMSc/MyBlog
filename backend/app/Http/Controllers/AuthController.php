<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // TÀM THỜI: login theo tài khoản cố định
        if ($email === "an@gmail.com" && $password === "123") {
            return response()->json([
                'token' => 'demo_token_'.time()
            ], 200);
        }

        return response()->json([
            'message' => 'Sai email hoặc mật khẩu'
        ], 401);
    }
}