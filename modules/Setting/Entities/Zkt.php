<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class Zkt extends Model
{
    use HasFactory, LogsActivityWithDetails;

    protected $fillable = ['device_id','ip_address','status'];
        
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting (Zkt)')
            ->setDescriptionForEvent(fn(string $eventName) => "Device credential {$eventName}")
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
    
}
