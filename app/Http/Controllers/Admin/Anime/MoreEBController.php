<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Models\MoreEmbed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoreEBController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moreeb = MoreEmbed::where('id', $id)->firstOrFail();
        $drives = DB::table('drives')->get();
        $resolutions = DB::table('resolutions')->get();

        return view('admin.moreeb.edit', compact('moreeb', 'drives', 'resolutions'));
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
        $data = $request->validate([
            'drive' => 'required',
            'resolution' => 'required',
            'embed_link' => 'required'
        ]);

        $moreeb = MoreEmbed::where('id', $id)->firstOrFail();

        $moreeb->fill($data)->save();
        if ($moreeb) {
            return redirect()->back()->with('success', 'Updated!!!');
        }
        return redirect()->back()->with('error', 'Something Wrong!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moreeb = MoreEmbed::findOrFail($id);

        $moreeb->delete();

        return redirect()->back()->with('success', 'Deleted!!!');
    }
}
