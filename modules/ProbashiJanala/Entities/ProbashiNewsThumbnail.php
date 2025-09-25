<?php

namespace Modules\ProbashiJanala\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProbashiNewsThumbnail extends Model
{
    use HasFactory;

    protected $fillable = ['probashi_news_id', 'thumbnail_path', 'frame_time'];
    protected $table = 'probashi_news_thumbnails';
}
