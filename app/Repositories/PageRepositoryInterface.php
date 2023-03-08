<?php

namespace App\Repositories;

interface PageRepositoryInterface
{
    public function index();

    public function animes();

    public function movies();

    public function hentai();

    public function manga();

    public function show($slug);

    public function about();

    public function guide();

    public function stream($slug, $id);

    public function download($slug, $id);

    public function pages_index();

    public function pages_show($request, $slug);

    public function pages_pricing();

    public function pages_profile($fb_id);

    public function pages_profile_update($request, $id);

    public function tv_channels();

    public function tv_channel_show($id);

    public function show_chapter($anime, $chapter, $request);

    public function search($request);
}
