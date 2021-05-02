<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Usecases\Users\UserIndexUsecase;
use App\Usecases\Users\UserStoreUsecase;
use App\Usecases\Users\UserShowUsecase;
use App\Usecases\Users\UserUpdateUsecase;
use App\Usecases\Users\UserDestroyUsecase;

class UserController extends Controller
{
    /**
     * @param  UserIndexUsecase $usecase
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserIndexUsecase $usecase)
    {
        return $usecase->handle();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserStoreUsecase $usecase
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreUsecase $usecase, UserRegisterRequest $request)
    {
        return $usecase->handle($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  UserShowUsecase $usecase
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserShowUsecase $usecase, int $id)
    {
        return $usecase->handle($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateUsecase  $usecase
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateUsecase $usecase, UserRegisterRequest $request, int $id)
    {
        return $usecase->handle($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserDestroyUsecase  $usecase
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyUsecase $usecase, int $id)
    {
        return $usecase->handle($id);
    }
}
