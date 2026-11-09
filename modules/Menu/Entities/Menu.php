<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivityWithDetails;
use Spatie\Activitylog\LogOptions;

class Menu extends Model
{
    use HasFactory, LogsActivityWithDetails;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'position',
                'style',
                'status',
                'mobile_status',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Menu');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'style',
        'status',
        'mobile_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'          => 'string',
        'position'      => 'string',
        'style'         => 'string',
        'status'        => 'integer',
        'mobile_status' => 'integer',
    ];

    /**
     * Summary of contents
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(MenuContent::class, 'menu_id', 'id');
    }

}
