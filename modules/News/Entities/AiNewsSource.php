<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;

class AiNewsSource extends Model
{
    protected $table = 'ai_news_sources';

    protected $fillable = [
        'name', 'feed_url', 'feed_url_hash', 'language_id', 'category_id',
        'is_enabled', 'last_fetched_at', 'last_error', 'created_by',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
        'last_fetched_at' => 'datetime',
    ];

    public function candidates(): HasMany
    {
        return $this->hasMany(AiNewsCandidate::class, 'source_id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
