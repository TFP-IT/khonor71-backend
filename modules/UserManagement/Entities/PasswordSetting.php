<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class PasswordSetting extends Model
{
    use HasFactory, softDeletes, LogsActivityWithDetails;

    protected $fillable = ['min_length','max_lifetime','password_complexcity','password_history','lock_out_duration','session_idle_logout_time','is_active'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('PasswordSetting')
            ->setDescriptionForEvent(fn(string $eventName) => "Password Setting {$eventName}")
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
    protected static function boot()
    {
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
                $model->created_by = Auth::id();
            });

            self::updating(function($model) {
                $model->updated_by = Auth::id();
            });
        }

        static::addGlobalScope('sortByLatest', function (Builder $builder) {
            $builder->orderByDesc('id');
        });
    }
}
