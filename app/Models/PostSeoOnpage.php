<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class PostSeoOnpage extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'news_id',
                'meta_keyword',
                'meta_description',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Seo (OnPage)');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id',
        'meta_keyword',
        'meta_description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'news_id'          => 'integer',
        'meta_keyword'     => 'string',
        'meta_description' => 'string',
    ];
}
