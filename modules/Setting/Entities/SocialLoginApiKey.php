<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class SocialLoginApiKey extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'provider',
                'client_id',
                'status',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Setting (SocialAPI)');
    }

    protected $fillable = [
        'provider',
        'client_id',
        'client_secret',
        'status',
    ];
    
    protected $casts = [
        'provider' => 'string',
        'client_id' => 'string',
        'client_secret' => 'string',
        'status' => 'boolean',
    ];
}
