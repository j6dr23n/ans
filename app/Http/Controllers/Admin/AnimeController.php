<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Anime\StoreRequest;
use App\Http\Requests\Anime\UpdateRequest;
use App\Repositories\Admin\AnimeRepositoryInterface;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function __construct(AnimeRepositoryInterface $animeRepository)
    {
        return $this->animeRepository = $animeRepository;
    }

    public function index()
    {
        return $this->animeRepository->index();
    }

    public function create()
    {
        return $this->animeRepository->create();
    }

    public function store(StoreRequest $request)
    {
        return $this->animeRepository->store($request);
    }

    public function edit($slug)
    {
        return $this->animeRepository->edit($slug);
    }

    public function update(UpdateRequest $request, $slug)
    {
        return $this->animeRepository->update($request, $slug);
    }

    public function destroy($id)
    {
        return $this->animeRepository->destroy($id);
    }
}
