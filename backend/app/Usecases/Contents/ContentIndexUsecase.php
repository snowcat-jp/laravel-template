<?php

namespace App\Usecases\Contents;

use App\Repositories\ContentsRepository;

class ContentIndexUsecase
{
    /**
     * @var ContentsRepository
     */
    private $contentsRepository;

    public function __construct(ContentsRepository $contentsRepository)
    {
        $this->contentsRepository = $contentsRepository;
    }

    public function handle()
    {
        return $this->contentsRepository->search();
    }
}
