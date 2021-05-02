<?php

namespace App\Usecases\Auth;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AuthLoginUsecase
{
    public function __construct()
    {
    }

    public function handle(UserLoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken(Str::random(10));
            $plainToken = explode('|', $token->plainTextToken)[1];
            return response()->json([
                'token' => $plainToken,
            ], 200);
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect'],
        ]);
    }
}
