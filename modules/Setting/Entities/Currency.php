<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class Currency extends Model
{
    use HasFactory, LogsActivityWithDetails;

    protected $fillable = ['country_id', 'symbol', 'title' , 'status'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting (Currency)')
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} a currency")
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
