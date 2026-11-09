<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class AISettings extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'model',
                'temperature',
                'max_tokens',
                'prompt_template',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Setting (AI)');
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ai_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['api_key', 'model', 'temperature', 'max_tokens', 'prompt_template'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'api_key'  => 'string',
        'model' => 'string',
        'temperature'     => 'float',
        'max_tokens' => 'integer',
    ];
}
