<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelServer extends Model
{
    use HasFactory;

    protected $fillable = ['channel_id','server_no','link'];
}
