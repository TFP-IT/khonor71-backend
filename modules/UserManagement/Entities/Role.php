<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class Role extends Model
{
    use HasFactory, LogsActivityWithDetails;

    protected $fillable = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Role')
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} a Role")
            ->logOnly(['name', 'guard_name'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
