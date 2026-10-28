<?php

namespace Modules\Localize\Entities;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__languages__';

    protected $guarded = [];

    protected static function booted(): void
    {
        // The language management UI and every language selector expose only
        // the retained Bangla portal language. The English row stays in the
        // database to preserve its existing foreign-key references.
        static::addGlobalScope('bangla_portal_language', function (Builder $query) {
            $query->where($query->getModel()->qualifyColumn('value'), 'bn');
        });
    }
}
