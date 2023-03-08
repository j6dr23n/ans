<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['anime_id','chapter_no','dl_link','img_path','pdf_path'];

    public function manga()
    {
        return $this->belongsTo(Anime::class, 'anime_id');
    }
}
