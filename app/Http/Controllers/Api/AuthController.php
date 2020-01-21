<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max: 50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($data);

        return new JsonResponse(array(
            'user' => $user,
        ),200);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data))
            return new JsonResponse(array(
                'message' => 'Wrong credentials'
            ),403);

        $accessToken = auth()->user()->api_token;

        return new JsonResponse(array(
            'api_token' => $accessToken,
            'id' => auth()->user()->id
        ),200);
    }
}
