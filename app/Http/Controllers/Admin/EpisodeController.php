<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Episode\StoreRequest;
use App\Http\Requests\Episode\UpdateRequest;
use App\Repositories\Admin\EpisodeRepositoryInterface;

class EpisodeController extends Controller
{
    public function __construct(EpisodeRepositoryInterface $episodeRepository)
    {
        return $this->episodeRepository = $episodeRepository;
    }

    public function show($id)
    {
        return $this->episodeRepository->show($id);
    }

    public function edit($id)
    {
        return $this->episodeRepository->edit($id);
    }

    public function create($id)
    {
        return $this->episodeRepository->create($id);
    }

    public function auto_create($id)
    {
        return $this->episodeRepository->auto_create($id);
    }

    public function store(StoreRequest $request)
    {
        return $this->episodeRepository->store($request);
    }

    public function update(UpdateRequest $request, $id)
    {
        return $this->episodeRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->episodeRepository->destroy($id);
    }
}
