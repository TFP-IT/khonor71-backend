<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        try {
            $user = $event->user;
            $roleNames = method_exists($user, 'getRoleNames') ? $user->getRoleNames()->implode(', ') : null;

            activity('Auth')
                ->causedBy($user)
                ->performedOn($user)
                ->event('login')
                ->withProperties([
                    'ip'         => request()?->ip(),
                    'user_agent' => request()?->userAgent(),
                    'url'        => request()?->fullUrl(),
                    'guard'      => $event->guard,
                    'email'      => $user->email ?? null,
                    'roles'      => $roleNames,
                ])
                ->log('User logged in');
        } catch (\Throwable $e) {
            // Fail silently to never block login
        }
    }
}
