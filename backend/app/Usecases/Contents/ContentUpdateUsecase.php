<?php

namespace App\Usecases\Contents;

use App\Http\Requests\ContentRequest;
use App\Repositories\ContentsRepository;

class ContentUpdateUsecase
{
    /**
     * @var ContentsRepository
     */
    private $contentsRepository;

    public function __construct(ContentsRepository $contentsRepository)
    {
        $this->contentsRepository = $contentsRepository;
    }

    public function handle(ContentRequest $request, int $id)
    {
        return $this->contentsRepository->update($id, $request->all());
    }
}
