<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\GenreRepositoryInterface;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        return $this->genreRepository = $genreRepository;
    }

    public function index()
    {
        return $this->genreRepository->index();
    }

    public function create()
    {
        return $this->genreRepository->create();
    }

    public function store(Request $request)
    {
        return $this->genreRepository->store($request);
    }

    public function edit($id)
    {
        return $this->genreRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->genreRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->genreRepository->destroy($id);
    }
}
