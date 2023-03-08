<?php

namespace App\Repositories\Admin;

interface EpisodeRepositoryInterface
{
    public function show($id);

    public function create($id);

    public function auto_create($id);

    public function store($request);

    public function update($request, $id);

    public function edit($id);

    public function destroy($id);
}
