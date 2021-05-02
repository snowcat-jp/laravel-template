<?php

namespace App\Usecases\Users;

use App\Repositories\UserRepository;

class UserShowUsecase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(int $id)
    {
        return $this->userRepository->firstOrFail(['id' => $id]);
    }
}
