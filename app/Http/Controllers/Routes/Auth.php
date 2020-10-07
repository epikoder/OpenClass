<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    public function signup(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email:dnf,rfc',
            'password' => 'required|string|min:6'
        ];
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return $validation->errors();
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully'
        ]);
    }

    public function login (Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (! FacadesAuth::attemp($credentials)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid email or password'
            ]);
        }
        //// Get user toke and return token
        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully',
            'data' => [
                'Authorization' => 'Not implemented yet'
            ]
        ]);
    }

    public function logout (Request $request)
    {
        FacadesAuth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]);
    }
}
