<?php

namespace Modules\AutoPost\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class AutoPostSetting extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'platform',
                'page_id',
                'is_test_mode',
                'is_active',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('AutoPost');
    }

    protected $fillable = [
        'platform',
        'page_id',
        'api_key',
        'api_secret',
        'access_token_secret',
        'access_token',
        'is_test_mode',
        'is_active',
    ];
}
