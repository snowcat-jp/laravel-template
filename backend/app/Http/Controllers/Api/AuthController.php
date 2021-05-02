<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Usecases\Auth\AuthLoginUsecase;

class AuthController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  AuthLoginUsecase  $usecase
     * @param  UserLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(AuthLoginUsecase $usecase, UserLoginRequest $request)
    {
        return $usecase->handle($request);
    }
}
