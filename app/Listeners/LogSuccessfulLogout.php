<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        try {
            $user = $event->user;

            activity('Auth')
                ->causedBy($user)
                ->performedOn($user)
                ->event('logout')
                ->withProperties([
                    'ip'         => request()?->ip(),
                    'user_agent' => request()?->userAgent(),
                    'guard'      => $event->guard,
                    'email'      => $user?->email,
                ])
                ->log('User logged out');
        } catch (\Throwable $e) {
            // Fail silently
        }
    }
}
