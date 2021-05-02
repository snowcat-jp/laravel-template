<?php

namespace App\Usecases\Users;

use App\Repositories\UserRepository;

class UserIndexUsecase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle()
    {
        return $this->userRepository->search();
    }
}
