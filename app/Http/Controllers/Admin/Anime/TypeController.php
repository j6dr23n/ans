<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Models\Anime\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->paginate(15);
        return view('admin.animes.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Type::class);

        return view('admin.animes.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Type::class);
        $data = $request->validate([
            'name' => 'required',
        ]);

        Type::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('types.index')->with('success', 'Type created!!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::where('id', $id)->firstOrFail();
        $this->authorize('update', $type);

        return view('admin.animes.type.edit', compact('type'));
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
        $type = Type::where('id', $id)->firstOrFail();
        $this->authorize('update', $type);

        $data = $request->validate([
            'name' => 'required'
        ]);

        $type->fill($data)->save();

        return redirect()->route('types.index')->with('success', 'Type updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $this->authorize('delete', $type);

        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type deleted!!!');
    }
}
