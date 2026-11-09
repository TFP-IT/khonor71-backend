<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class EmailConfig extends Model
{
    use HasFactory, LogsActivityWithDetails;

    protected $guarded = [];    

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting (EmailConfig)')
            ->setDescriptionForEvent(fn(string $eventName) => "Email config {$eventName}")
            ->logExcept(['password'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
