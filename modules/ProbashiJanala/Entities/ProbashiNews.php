<?php

namespace Modules\ProbashiJanala\Entities;

use App\Models\User;
use App\Enums\ActivationStatusEnum;
use App\Models\WebUser as ModelsWebUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Localize\Entities\Language;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProbashiNews extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'probashi_news';

    protected $fillable = [
        'language_id',
        'web_user_id',
        'publish_date',
        'total_view',
        'title',
        'details',
        'encode_title',
        'thumbnail_image',
        'image_alt',
        'image_title',
        'video',
        'video_url',
        'reference',
        'meta_keyword',
        'meta_description',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'language_id' => 'integer',
        'web_user_id' => 'integer',
        'publish_date' => 'date',
        'total_view' => 'integer',
        'title' => 'string',
        'details' => 'string',
        'thumbnail_image' => 'string',
        'image_alt' => 'string',
        'image_title' => 'string',
        'video' => 'string',
        'video_url' => 'string',
        'reference' => 'string',
        'meta_keyword' => 'string',
        'meta_description' => 'string',
        'status' => ActivationStatusEnum::class,
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
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

            self::deleted(function ($model) {
                $model->updated_by = Auth::id();
                $model->save();
            });
        }
    }

    /**
     * Summary of web_user
     * @return BelongsTo
     */
    public function webUser()
    {
        return $this->belongsTo(ModelsWebUser::class, 'web_user_id');
    }

    /**
     * Summary of language
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /**
     * Post User
     * @return BelongsTo
     */
    public function postByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}