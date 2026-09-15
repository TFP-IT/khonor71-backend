<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Localize\Entities\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BreakingNews extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'news_id',
        'url',
        'title',
        'time_stamp',
        'start_time',
        'end_time',
        'priority',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'language_id'=> 'integer',
        'news_id'    => 'integer',
        'url'        => 'string',
        'title'      => 'string',
        'time_stamp' => 'integer',
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
        'priority'   => 'integer',
        'status'     => 'integer',
    ];

    /**
     * Summary of language
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /**
     * Summary of news
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function news()
    {
        return $this->belongsTo(NewsMst::class, 'news_id');
    }

    /**
     * Get clean headline string (supports legacy JSON format and plain text)
     * @return string
     */
    public function getHeadlineAttribute(): string
    {
        $raw = (string) $this->title;
        if (str_starts_with(trim($raw), '{')) {
            $decoded = json_decode($raw, true);
            if (is_array($decoded) && isset($decoded['news_title'])) {
                return (string) $decoded['news_title'];
            }
        }
        return $raw;
    }

    /**
     * Get resolved URL (supports url attribute, legacy JSON, and relative/absolute URLs)
     * @return string
     */
    public function getResolvedUrlAttribute(): string
    {
        $url = (string) ($this->attributes['url'] ?? '');
        if ($url === '' && str_starts_with(trim((string) $this->title), '{')) {
            $decoded = json_decode((string) $this->title, true);
            if (is_array($decoded) && !empty($decoded['url'])) {
                $url = (string) $decoded['url'];
            }
        }
        return $url;
    }

    /**
     * Check if breaking news is currently active based on status and schedule
     * @return bool
     */
    public function getIsCurrentlyActiveAttribute(): bool
    {
        if ($this->status !== 1) {
            return false;
        }

        $now = now();
        if ($this->start_time && $this->start_time->isFuture()) {
            return false;
        }
        if ($this->end_time && $this->end_time->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Scope query to active and scheduled breaking news items
     */
    public function scopeActive($query)
    {
        $now = now();
        return $query->where('status', 1)
            ->where(function ($q) use ($now) {
                $q->whereNull('start_time')->orWhere('start_time', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_time')->orWhere('end_time', '>=', $now);
            });
    }

    /**
     * Scope query ordered by priority descending then created_at descending
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('priority', 'desc')->latest('created_at');
    }
}
