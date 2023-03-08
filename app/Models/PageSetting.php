<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    use HasFactory;

    protected $fillable = ['page_id','streamsb_api_key','streamtape_api_key','streamtape_api_pwd','upstream_api_key','kpay','wavepay','monthly_cost','lifetime_cost'];
}
