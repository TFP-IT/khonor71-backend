<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailServiceConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        try {
            if (\Schema::hasTable('email_configs')) {
                $mail = DB::table('email_configs')->first();
                if ($mail)
                {
                    $config = array(
                        'driver'     => $mail->protocol,
                        'host'       => $mail->smtp_host,
                        'port'       => $mail->smtp_port,
                        'from'       => array('address' => config('mail.from.address', 'hello@hello.com'), 'name' => config('mail.from.name', 'testApp')),
                        'encryption' => config('mail.mailers.smtp.encryption', 'tls'),
                        'username'   => $mail->smtp_user,
                        'password'   => $mail->smtp_pass,
                        'sendmail'   => '/usr/sbin/sendmail -bs',
                        'pretend'    => false,
                    );
                    Config::set('mail', $config);
                    Config::set('mail.mailers.smtp.host', $mail->smtp_host);
                    Config::set('mail.mailers.smtp.port', $mail->smtp_port);
                    Config::set('mail.mailers.smtp.username', $mail->smtp_user);
                    Config::set('mail.mailers.smtp.password', $mail->smtp_pass);
                }
            }
        } catch (\Throwable $e) {
            // Failsafe during CLI commands or bootstrap without DB
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
