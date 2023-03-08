<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreEmbed extends Model
{
    use HasFactory;

    protected $fillable = ['episode_id','drive','resolution','embed_link'];

    public function episode()
    {
        return $this->belongsTo(Episode::class, 'episode_id');
    }
}
