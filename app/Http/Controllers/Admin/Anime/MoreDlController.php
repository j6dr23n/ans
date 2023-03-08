<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\Controller;
use App\Models\MoreDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoreDlController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moredl = MoreDownload::where('id', $id)->firstOrFail();
        $drives = DB::table('drives')->get();
        $resolutions = DB::table('resolutions')->get();

        return view('admin.moredl.edit', compact('moredl', 'drives', 'resolutions'));
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
            'download_link' => 'required'
        ]);

        $moredl = MoreDownload::where('id', $id)->firstOrFail();

        $moredl->fill($data)->save();
        if ($moredl) {
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
        $moredl = MoreDownload::findOrFail($id);

        $moredl->delete();

        return redirect()->back()->with('success', 'Deleted!!!');
    }
}
