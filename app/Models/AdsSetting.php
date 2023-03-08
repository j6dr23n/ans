<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsSetting extends Model
{
    use HasFactory;

    protected $fillable = ['adsblock','popup_ads','social_bar_ads','top_720x90_ads','dl_720x90_ads','feature_160x300_ads','post_160x300_ads','episode_160x300_ads','native_ads','ads_code','page_id'];
}
