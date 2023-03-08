<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Repositories\Admin\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function __construct(PageRepositoryInterface $pageRepository)
    {
        return $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        return $this->pageRepository->index();
    }

    public function all()
    {
        return $this->pageRepository->all();
    }

    public function posts()
    {
        return $this->pageRepository->posts();
    }

    public function analytics()
    {
        return $this->pageRepository->analytics();
    }

    public function logs()
    {
        return $this->pageRepository->logs();
    }

    public function movies()
    {
        return $this->pageRepository->movies();
    }

    public function manga()
    {
        return $this->pageRepository->manga();
    }

    public function hentai()
    {
        return $this->pageRepository->hentai();
    }

    public function show_chapter(Anime $anime, $id)
    {
        return $this->pageRepository->show_chapter($anime, $id);
    }

    public function download_logs()
    {
        return $this->pageRepository->download_logs();
    }

    public function advancedFileUpload(Request $request)
    {
        return $this->pageRepository->advancedFileUpload($request);
    }

    public function search(Request $request)
    {
        return $this->pageRepository->search($request);
    }
}
