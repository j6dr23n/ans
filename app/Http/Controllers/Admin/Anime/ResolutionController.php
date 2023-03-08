<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Models\Anime\Resolution;
use Illuminate\Http\Request;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resolutions = Resolution::latest()->paginate(10);

        return view('admin.animes.resolutions.index',compact('resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Resolution::class);
        return view('admin.animes.resolutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Resolution::class);
        $data = $request->validate([
            'pixel' => 'required',
        ]);

        Resolution::create([
            'pixel' => $data['pixel'],
        ]);

        return redirect()->route('resolutions.index')->with('success','Resolution pixels created!!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolution = Resolution::where('id',$id)->firstOrFail();
        $this->authorize('update',$resolution);

        return view('admin.animes.resolutions.edit',compact('resolution'));
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
        $resolution = Resolution::where('id',$id)->firstOrFail();
        $this->authorize('update',$resolution);

        $data = $request->validate([
            'pixel' => 'required'
        ]);

        $resolution->fill($data)->save();

        return redirect()->route('resolutions.index')->with('success','Resolution edited!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resolution = Resolution::findOrFail($id);
        $this->authorize('delete',$resolution);

        $resolution->delete();

        return redirect()->route('resolutions.index')->with('success','Resolution deleted!!!');
    }
}
