<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Chapter;
use App\Repositories\PageRepositoryInterface;
use Illuminate\Http\Request;

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

    public function animes()
    {
        return $this->pageRepository->animes();
    }

    public function movies()
    {
        return $this->pageRepository->movies();
    }

    public function hentai()
    {
        return $this->pageRepository->hentai();
    }

    public function manga()
    {
        return $this->pageRepository->manga();
    }

    public function show($slug)
    {
        return $this->pageRepository->show($slug);
    }

    public function stream($slug, $id)
    {
        return $this->pageRepository->stream($slug, $id);
    }

    public function download($slug, $id)
    {
        return $this->pageRepository->download($slug, $id);
    }

    public function show_chapter(Anime $anime, Chapter $chapter, Request $request)
    {
        return $this->pageRepository->show_chapter($anime, $chapter, $request);
    }

    public function pages_index()
    {
        return $this->pageRepository->pages_index();
    }

    public function pages_show(Request $request, $slug)
    {
        return $this->pageRepository->pages_show($request, $slug);
    }

    public function pages_pricing()
    {
        return $this->pageRepository->pages_pricing();
    }

    public function pages_profile($fb_id)
    {
        return $this->pageRepository->pages_profile($fb_id);
    }

    public function pages_profile_update(Request $request, $id)
    {
        return $this->pageRepository->pages_profile_update($request, $id);
    }

    public function tv_channels()
    {
        return $this->pageRepository->tv_channels();
    }

    public function tv_channel_show($id)
    {
        return $this->pageRepository->tv_channel_show($id);
    }

    public function about()
    {
        return $this->pageRepository->about();
    }

    public function guide()
    {
        return $this->pageRepository->guide();
    }

    public function search(Request $request)
    {
        return $this->pageRepository->search($request);
    }
}
