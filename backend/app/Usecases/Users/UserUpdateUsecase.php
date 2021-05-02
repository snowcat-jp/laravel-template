<?php

namespace App\Usecases\Users;

use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class UserUpdateUsecase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserRequest $request, int $id)
    {
        $params = UserService::formatRequestParams($request->all());
        return $this->userRepository->update($id, $params);
    }
}
