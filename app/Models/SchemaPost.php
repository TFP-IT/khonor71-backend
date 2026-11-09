<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class SchemaPost extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'news_id',
                'type',
                'url',
                'headline',
                'description',
                'active_status',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Seo (Schema)');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id',
        'type',
        'url',
        'headline',
        'description',
        'image_url',
        'author_type',
        'author_name',
        'publisher',
        'publisher_logo',
        'publishdate',
        'modifidate',
        'active_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'news_id'        => 'integer',
        'type'           => 'string',
        'url'            => 'string',
        'headline'       => 'string',
        'description'    => 'string',
        'image_url'      => 'string',
        'author_type'    => 'string',
        'author_name'    => 'string',
        'publisher'      => 'string',
        'publisher_logo' => 'string',
        'publishdate'    => 'date',
        'modifidate'     => 'date',
        'active_status'  => 'string',
    ];
}
