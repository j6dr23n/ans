<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Episode extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['animes_id','epi_number'])
        ->useLogName('episodes')
        ->setDescriptionForEvent(fn (string $eventName) => "'{$this->anime->title }' episode {$this->epi_number} was {$eventName}")
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function anime()
    {
        return $this->belongsTo(Anime::class, 'animes_id');
    }

    public function downloads()
    {
        return $this->hasMany(MoreDownload::class, 'episode_id');
    }

    public function embeds()
    {
        return $this->hasMany(MoreEmbed::class, 'episode_id');
    }
}
