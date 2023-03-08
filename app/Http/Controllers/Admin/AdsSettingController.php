<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsSetting\StoreRequest;
use App\Models\AdsSetting;
use Illuminate\Http\Request;

class AdsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if (auth()->user()->page->allow_ads === 1) {
            $ads_setting = AdsSetting::updateOrCreate(
                [
                   'page_id'   => auth()->user()->page_id
                ],
                [
                   'page_id' => auth()->user()->page_id,
                   'ads_code' => auth()->user()->page->ads_code,
                   'top_720x90_ads' => $data['top_720x90_ads'] ?? false,
                   'dl_720x90_ads' => $data['dl_720x90_ads'] ?? false,
                   'feature_160x300_ads' => $data['feature_160x300_ads'] ?? false,
                   'post_160x300_ads' => $data['post_160x300_ads'] ?? false,
                   'episode_160x300_ads' => $data['episode_160x300_ads'] ?? false,
                   'native_ads' => $data['native_ads'] ?? false,
                   'adsblock' => $data['adsblock'] ?? false,
                   'popup_ads' => $data['popup_ads'] ?? false,
                   'social_bar_ads' => $data['social_bar_ads'] ?? false,
                ]
            );
        } else {
            return back()->with('error', 'You\'re dont meet requirment for add ads to your page!!!');
        }


        if ($ads_setting) {
            return back()->with('success', 'Updated!!!');
        }

        return back()->with('error', 'Something Wrong!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdsSetting  $adsSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AdsSetting $adsSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdsSetting  $adsSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AdsSetting $adsSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdsSetting  $adsSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdsSetting $adsSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdsSetting  $adsSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdsSetting $adsSetting)
    {
        //
    }
}
