<?php

namespace App\Http\Controllers\API\v1\Auth;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\v1\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->errorResponse([
                'message' => 'Unauthorized'
            ],'Authentication Failed', 500);
        }

        $user = User::where('email', $request->email)->first();
        if ( ! Hash::check($request->password, $user->password, [])) {
            throw new \Exception('Invalid Credentials');
        }

        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return $this->successResponse([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $user
        ],'Authenticated');
    }
}
