<?php

namespace App\Usecases\Contents;

use App\Http\Requests\ContentRequest;
use App\Repositories\ContentsRepository;

class ContentStoreUsecase
{
    /**
     * @var ContentsRepository
     */
    private $contentsRepository;

    public function __construct(ContentsRepository $contentsRepository)
    {
        $this->contentsRepository = $contentsRepository;
    }

    public function handle(ContentRequest $request)
    {
        return $this->contentsRepository->create($request->all());
    }
}
