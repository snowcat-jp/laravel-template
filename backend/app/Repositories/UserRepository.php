<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepositoryTrait;

class UserRepository
{
    use BaseRepositoryTrait;

    private $model;
    /**
     * constract
     * @param User $model
     */
    public function __construct(User $contents)
    {
        $this->model = $contents;
    }
}
