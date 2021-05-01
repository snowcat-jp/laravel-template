<?php

namespace App\Repositories;

use App\Models\Contents;
use App\Repositories\BaseRepositoryTrait;

class ContentsRepository
{
    use BaseRepositoryTrait;

    private $model;
    /**
     * constract
     * @param Contents $model
     */
    public function __construct(Contents $contents)
    {
        $this->model = $contents;
        // $this->model = new $contents;
        // $this->model = app()->make($contents);
    }
}
