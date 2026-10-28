<?php

namespace Modules\Setting\Entities;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Category\Entities\Category;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;    
    use LogsActivity;

    protected $fillable = ['title' , 'slug' , 'status'];  

    protected static function booted(): void
    {
        static::addGlobalScope('bangla_portal_language', function (Builder $query) {
            $query->where($query->getModel()->qualifyColumn('value'), 'bn');
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting (Language)')
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} a language")
            ->logAll();
    }

    public static function getDefault()
    {
        return Cache::remember('defaultLanguage', 60, function () {
            return self::where('value', 'bn')->first();
        });
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'language_id', 'id');
    }
}
