<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Usecases\Auth\AuthLoginUsecase;
use App\Usecases\Auth\AuthLogoutUsecase;

class AuthController extends Controller
{
    /**
     *
     * @param  AuthLoginUsecase  $usecase
     * @param  UserLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(AuthLoginUsecase $usecase, UserLoginRequest $request)
    {
        return $usecase->handle($request);
    }

    /**
     *
     * @param  AuthLogoutUsecase $usecase
     * @param  UserLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(AuthLogoutUsecase $usecase)
    {
        return $usecase->handle();
    }
}
