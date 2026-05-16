<?php

namespace App\Console;

use App\Models\Admin;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $admin = Admin::first();
            $readNotifications = $admin->notifications;
            foreach ($readNotifications as $notification) {
                if (!is_null($notification->read_at)) {
                    $notification->delete();
                }
            }
        })->dailyAt('23:59');
        $schedule->command('config:clear')->daily();
        $schedule->command('optimize:clear')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
