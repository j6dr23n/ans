<?php

namespace App\Http\Controllers;

use App\Models\WatchList;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    public function index()
    {
        $items = WatchList::with('episode', 'chapter')->where('user_id', auth()->id())->paginate(12);

        return view('pages.watchlist', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'episode_id' => 'int|nullable',
            'chapter_id' => 'int|nullable'
        ]);
        $data['user_id'] = auth()->id();
        $wl =  WatchList::create($data);

        if ($wl) {
            return redirect()->back()->with('success', 'Watchlist Added!!!');
        }
        return back()->with('error', 'Something Wrong!!!');
    }

    public function destroy($id)
    {
        $wl = WatchList::where('id', $id)->firstOrFail();

        $wl->delete();

        return back()->with('success', 'Watchlist Removed!!!');
    }
}
