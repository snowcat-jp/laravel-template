<?php

namespace App\Usecases\Contents;

use App\Repositories\ContentsRepository;

class ContentShowUsecase
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
        return $this->contentsRepository->firstOrFail(['id' => $id]);
    }
}
