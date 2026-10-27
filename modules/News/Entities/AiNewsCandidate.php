<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;

class AiNewsCandidate extends Model
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_REVIEWED = 'reviewed';
    public const STATUS_FAILED = 'failed';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_IMPORTED = 'imported';

    protected $table = 'ai_news_candidates';

    protected $fillable = [
        'source_id', 'source_hash', 'source_guid', 'source_url', 'source_title',
        'source_excerpt', 'source_published_at', 'language_id', 'category_id',
        'title', 'short_head', 'summary', 'body', 'meta_title', 'meta_description',
        'keywords', 'model_name', 'generation_attempts', 'status', 'error_message', 'reviewed_by',
        'reviewed_at', 'news_mst_id',
    ];

    protected $casts = [
        'source_published_at' => 'datetime',
        'keywords' => 'array',
        'generation_attempts' => 'integer',
        'reviewed_at' => 'datetime',
    ];

    public function source(): BelongsTo
    {
        return $this->belongsTo(AiNewsSource::class, 'source_id');
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
