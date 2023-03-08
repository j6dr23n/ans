<?php

namespace App\Repositories\Admin;

use App\Models\Genre;
use App\Repositories\Admin\GenreRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenreRepository implements GenreRepositoryInterface
{
    use AuthorizesRequests;
    public function index()
    {
        $genres = DB::table('genres')->latest()->paginate(10);

        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        $this->authorize('create', Genre::class);
        return view('admin.genres.create');
    }

    public function store($request)
    {
        $this->authorize('create', Genre::class);
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();

        $genre = Genre::create([
            'name' => $data['name'],
        ]);
        if ($genre) {
            return redirect()->route('genres.index')->with('success', 'Genre Created!!!');
        } else {
            return back()->with('error', 'Something Wrong!!!');
        }
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        $this->authorize('update', $genre);

        return view('admin.genres.edit', compact('genre'));
    }

    public function update($request, $id)
    {
        $genre = Genre::findOrFail($id);

        $this->authorize('update', $genre);

        if ($genre) {
            $data = $request->all();

            $genre->fill($data)->save();

            return redirect()->route('genres.index')->with('success', 'Genre Updated!!!');
        } else {
            return back()->with('error', 'Something Wrong!!!');
        }
    }

    public function destroy($id)
    {
        $genre = Genre::where('id', $id)->first();
        $this->authorize('delete', $genre);

        if ($genre) {
            $status = $genre->delete();

            if ($status) {
                return back()->with('success', 'Genre Deleted!!!');
            }
            return back()->with('error', 'Something Wrong!!');
        } else {
            return back()->with('Data has been removed!!!');
        }
    }
}
