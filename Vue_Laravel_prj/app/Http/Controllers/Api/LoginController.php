<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
    public function create() {
        //未ログインの状態で、ログイン用ページにアクセスしたときに返す
        return $this->sendError('Authentication Required.', [], 401);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return response()->json(['status_code' => 200,'message' => 'success'],200);
        } else {
            return response()->json(['status_code' => 500,'message' => 'Unauthorized'],200);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['status_code' => 200,'message' => 'Logged out'], 200);
    }
}
