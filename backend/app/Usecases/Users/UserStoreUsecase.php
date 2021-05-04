<?php

namespace App\Usecases\Users;

use App\Services\UserService;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserStoreUsecase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserRegisterRequest $request)
    {
        $params = UserService::formatRequestParams($request->all());
        $user = $this->userRepository->create($params);
        event(new Registered($user));
        Auth::login($user);
        return '';
    }
}
