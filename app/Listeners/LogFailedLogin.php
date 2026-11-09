<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;

class LogFailedLogin
{
    /**
     * Handle the event.
     */
    public function handle(Failed $event): void
    {
        try {
            $user = $event->user;
            $email = $event->credentials['email'] ?? ($event->credentials['username'] ?? 'Unknown');

            $logger = activity('Auth')
                ->event('failed_login')
                ->withProperties([
                    'ip'              => request()?->ip(),
                    'user_agent'      => request()?->userAgent(),
                    'attempted_email' => $email,
                    'guard'           => $event->guard,
                ]);

            if ($user) {
                $logger->causedBy($user)->performedOn($user);
            }

            $logger->log("Failed login attempt for: {$email}");
        } catch (\Throwable $e) {
            // Fail silently
        }
    }
}
