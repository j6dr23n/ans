<?php

namespace App\Repositories\Admin;

interface ChannelRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($channel);

    public function update($request,$channel);

    public function destroy($channel);
}