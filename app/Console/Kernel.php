<?php

namespace App\Console;


use DB;
use Auth;
use Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\RetailerInvoice',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->exec('php -d register_argc_argv=On /home/basitin1/bolbook.basitinfotech.com/artisan command:retailerinvoice')->everyMinute();
                 // ->everyMinute();
        $schedule->command('command:retailerinvoice')
                 ->everyMinute()->sendOutputTo('storage/cronlog');
        // $schedule->command('command:retailerinvoice')
        //          ->monthlyOn(3, '5:00')
        //          ->emailOutputTo('abdulbasit3398@gmail.com');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
