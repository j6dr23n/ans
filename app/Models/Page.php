<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','poster','info','fb','tele','email','banned'];

    public function animes()
    {
        return $this->hasMany(Anime::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'page_id');
    }

    public function setting()
    {
        return $this->hasOne(PageSetting::class, 'page_id');
    }
    public function ads_setting()
    {
        return $this->hasOne(AdsSetting::class, 'page_id');
    }

    public function isTop720x90AdsOpen()
    {
        return $this->ads_setting && $this->ads_setting->top_720x90_ads === 1 ? true : false;
    }

    public function isDL720x90AdsAdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->dl_720x90_ads === 1 ? true : false;
    }

    public function isFeature160x300AdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->feature_160x300_ads === 1 ? true : false;
    }

    public function isPost160x300AdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->post_160x300_ads === 1 ? true : false;
    }

    public function isEpisode160x300AdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->episode_160x300_ads === 1 ? true : false;
    }

    public function isNativeAdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->native_ads === 1 ? true : false;
    }

    public function isAdsBlock()
    {
        return $this->ads_setting !== null && $this->ads_setting->adsblock === 1 ? true : false;
    }

    public function isPopupAdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->popup_ads === 1 ? true : false;
    }

    public function isSocialBarAdsOpen()
    {
        return $this->ads_setting !== null && $this->ads_setting->social_bar_ads === 1 ? true : false;
    }
}
