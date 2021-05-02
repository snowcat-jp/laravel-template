<?php

namespace App\Usecases\Auth;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AuthLogoutUsecase
{
    public function __construct()
    {
    }

    public function handle()
    {
        Auth::user()->tokens()->delete();
        // Auth::logout();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
