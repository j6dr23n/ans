<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['name','image'];

    public function servers()
    {
        return $this->hasMany(ChannelServer::class,'channel_id');
    }
}
