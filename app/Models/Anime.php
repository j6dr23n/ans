<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Anime extends Model implements Viewable
{
    use HasFactory;
    use LogsActivity;
    use InteractsWithViews;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($anime) {
            $anime->slug = $anime->generateSlug($anime->title);
            $anime->save();
        });
    }

    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title'])
        ->useLogName('animes')
        ->setDescriptionForEvent(fn (string $eventName) => "({$this->type}) '{$this->title}' was {$eventName}")
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'anime_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'animes_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
