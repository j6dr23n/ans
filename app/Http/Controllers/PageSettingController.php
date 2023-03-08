<?php

namespace App\Http\Controllers;

use App\Models\AdsSetting;
use App\Models\PageSetting;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Http\Request;

class PageSettingController extends Controller
{
    public function index()
    {
        $setting = PageSetting::where('page_id', auth()->user()->page_id)->latest()->first();
        $ads_setting = AdsSetting::where('page_id', auth()->user()->page_id)->orWhere('ads_code', auth()->user()->page->ads_code)->latest()->first();
        $view_count = View::where('collection->page_id', auth()->user()->page_id)->count();

        return view('admin.pages.settings', compact('setting', 'ads_setting', 'view_count'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
           'streamsb_api_key' => 'nullable|int',
           'streamtape_api_key' => 'nullable|int',
           'streamtape_api_pwd' => 'nullable|int',
           'upstream_api_key' => 'nullable|int',
           'monthly_cost' => 'nullable|int',
           'lifetime_cost' => 'nullable|int',
           'kpay' => 'nullable|int',
           'wavepay' => 'nullable|int'
        ]);
        if (auth()->user()->page) {
            $setting = PageSetting::updateOrCreate(
                [
                   'page_id'   => auth()->user()->page_id
                ],
                [
                   'page_id' => auth()->user()->page_id,
                   'streamsb_api_key' => $data['streamsb_api_key'],
                   'streamtape_api_key' => $data['streamtape_api_key'],
                   'streamtape_api_pwd' => $data['streamtape_api_pwd'],
                   'upstream_api_key' => $data['upstream_api_key'],
                   'monthly_cost' => $data['monthly_cost'],
                   'lifetime_cost' => $data['lifetime_cost'],
                   'kpay' => $data['kpay'],
                   'wavepay' => $data['wavepay']
                ]
            );
            return back()->with('success', 'Updated!!!');
        }
        return back()->with('error', 'You have no page!!!');
    }
}
