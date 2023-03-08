<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Models\Anime\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drives = Drive::latest()->paginate(10);

        return view('admin.animes.drives.index', compact('drives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Drive::class);
        return view('admin.animes.drives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Drive::class);
        $data = $request->validate([
            'name' => 'required',
        ]);

        Drive::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('drives.index')->with('success', 'Drive created!!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drive = Drive::where('id', $id)->firstOrFail();
        $this->authorize('update', $drive);

        return view('admin.animes.drives.edit', compact('drive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $drive = Drive::where('id', $id)->firstOrFail();
        $this->authorize('update', $drive);

        $data = $request->validate([
            'name' => 'required'
        ]);

        $drive->fill($data)->save();

        return redirect()->route('drives.index')->with('success', 'Drive edited!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = Drive::findOrFail($id);
        $this->authorize('delete', $drive);

        $drive->delete();

        return redirect()->route('drives.index')->with('success', 'Drive deleted!!!');
    }
}
