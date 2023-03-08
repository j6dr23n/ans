<?php

namespace App\Repositories\Admin;

interface PageRepositoryInterface
{
    public function index();

    public function all();

    public function posts();

    public function analytics();

    public function download_logs();

    public function logs();

    public function movies();

    public function manga();

    public function hentai();

    public function search($request);

    public function advancedFileUpload($request);
}
