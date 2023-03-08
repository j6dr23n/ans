<?php

namespace App\Repositories\Admin;

use App\Models\Page;
use App\Repositories\Admin\PagesRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesRepository implements PagesRepositoryInterface
{
    use AuthorizesRequests;

    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store($request)
    {
        $this->authorize('create', Page::class);

        $data = $request->validate([
            'name' => 'required|string',
            'info' => 'required|string',
            'poster' => ['required','regex:/(\.jpg|\.png|\.gif|\.jpeg)$/i'],
            'fb' => 'required|string',
            'tele' => 'required|string',
            'email' => 'required|email'
        ]);
        $data['slug'] = Str::slug($data['name']);

        $page = Page::create($data);
        if ($page) {
            return redirect()->route('page.index')->with('success', 'Page Created Successfully');
        }
        return redirect()->back()->with('error', 'Something Worng!!!');
    }

    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $this->authorize('update', $page);

        return view('admin.page.edit', compact('page'));
    }

    public function update($request, $slug)
    {
        $data = $request->all();
        $page = Page::where('slug', $slug)->firstOrFail();
        $this->authorize('update', $page);

        $data['slug'] = Str::slug($data['name']);

        $page->update($data);
        if ($page) {
            return redirect()->route('page.index')->with('success', 'Page Updated Successfully');
        }
        return redirect()->back()->with('error', 'Something Worng!!!');
    }

    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $this->authorize('delete', $page);

        if ($page) {
            $page->delete();

            return redirect()->route('page.index')->with('success', 'Page Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Something Worng!!!');
    }
}
