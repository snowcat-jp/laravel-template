<?php

namespace App\Usecases\Auth;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
            return response()->json(['message' => 'Login successful'], 200);
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect'],
        ]);
    }
}
