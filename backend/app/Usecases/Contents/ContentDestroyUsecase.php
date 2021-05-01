<?php

namespace App\Usecases\Contents;

use App\Repositories\ContentsRepository;

class ContentDestroyUsecase
{
    /**
     * @var ContentsRepository
     */
    private $contentsRepository;

    public function __construct(ContentsRepository $contentsRepository)
    {
        $this->contentsRepository = $contentsRepository;
    }

    public function handle(int $id)
    {
        return $this->contentsRepository->delete($id);
    }
}
