<?php

namespace App\Traits;

use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogsActivityWithDetails
{
    use LogsActivity;

    /**
     * Mutate the activity before it is saved.
     */
    public function tapActivity(Activity $activity, string $eventName): void
    {
        try {
            if (app()->runningInConsole() && !request()) {
                $activity->properties = collect($activity->properties ?? [])->merge([
                    'source' => 'console/artisan',
                ]);
                return;
            }

            if (request()) {
                $activity->properties = collect($activity->properties ?? [])->merge([
                    'ip'         => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url'        => request()->fullUrl(),
                    'method'     => request()->method(),
                ]);
            }
        } catch (\Throwable $e) {
            // Silently pass to avoid breaking main model operations if request() throws
        }
    }
}
