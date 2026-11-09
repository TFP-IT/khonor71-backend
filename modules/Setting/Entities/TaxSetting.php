<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class TaxSetting extends Model
{
    use HasFactory, LogsActivityWithDetails;

    protected $fillable = [
        'tax_number',
        'tax_name',
        'tax_percentage',
        'tax_group_id'
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting (Tax)')
            ->setDescriptionForEvent(fn (string $eventName) => "Tax setting {$eventName}")
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
