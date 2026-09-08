<?php

namespace Modules\RssFeeds\Entities;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Localize\Entities\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RssFeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'feed_name',
        'slug',
        'feed_url',
        'posts',
        'cache_duration',
        'category_id',
        'fallback_image',
        'summary_length',
        'include_keywords',
        'exclude_keywords',
        'paper_language',
        'show_button',
        'button_text',
        'status',
    ];

    protected $casts = [
        'feed_name'=> 'string',
        'slug'=> 'string',
        'feed_url'=> 'string',
        'posts'=> 'integer',
        'cache_duration' => 'integer',
        'category_id' => 'integer',
        'fallback_image' => 'string',
        'summary_length' => 'integer',
        'include_keywords' => 'string',
        'exclude_keywords' => 'string',
        'paper_language'=> 'integer',
        'show_button'=> 'integer',
        'button_text' => 'string',
        'status'=> 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        if (Auth::check()) {
            self::creating(function ($model) {
                $model->created_by = Auth::id();
            });

            self::updating(function ($model) {
                $model->updated_by = Auth::id();
            });
        }
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'paper_language');
    }

    public function category()
    {
        return $this->belongsTo(\Modules\Category\Entities\Category::class, 'category_id');
    }
}
