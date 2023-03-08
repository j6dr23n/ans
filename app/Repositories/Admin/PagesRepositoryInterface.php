<?php

namespace App\Repositories\Admin;

interface PagesRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);
    
    public function edit($slug);

    public function update($request, $slug);

    public function destroy($slug);

}
