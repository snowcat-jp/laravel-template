<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Http\Controllers\Controller;
use App\Usecases\Contents\ContentIndexUsecase;
use App\Usecases\Contents\ContentStoreUsecase;
use App\Usecases\Contents\ContentShowUsecase;
use App\Usecases\Contents\ContentUpdateUsecase;
use App\Usecases\Contents\ContentDestroyUsecase;

class ContentController extends Controller
{
    /**
     * @param  ContentIndexUsecase $usecase
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContentIndexUsecase $usecase)
    {
        return $usecase->handle();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContentStoreUsecase $usecase
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentStoreUsecase $usecase, ContentRequest $request)
    {
        return $usecase->handle($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  ContentShowUsecase $usecase
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContentShowUsecase $usecase, int $id)
    {
        return $usecase->handle($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentUpdateUsecase  $usecase
     * @param  ContentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentUpdateUsecase $usecase, ContentRequest $request, int $id)
    {
        return $usecase->handle($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContentDestroyUsecase  $usecase
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentDestroyUsecase $usecase, int $id)
    {
        return $usecase->handle($id);
    }
}
