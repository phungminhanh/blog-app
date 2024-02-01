<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Post;
class Kernel extends ConsoleKernel
{
    // App\Http\Kernel.php

   
    /**
     * Define the application's command schedule.
     */
  

     protected $commands = [
        Commands\ResetViewDaily::class,
    ];
    
    protected function schedule(Schedule $schedule)
    {
        // Chạy command reset:view_daily mỗi ngày lúc 00:00
        $schedule->command('reset:view_daily')->dailyAt('00:00');
    }
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
