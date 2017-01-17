<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\Task;
use App\Http\Controllers\TaskController;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        // $schedule->command('inspire')
        //          ->hourly();
        
        $schedule->call(function() {
            $query = DB::select('select count(t.id)
                                  from tasks as t
                                 where t.status < 100
                                   and date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 1 day), \'%d/%m/%Y\')
                                    or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 3 day), \'%d/%m/%Y\')
                                    or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 7 day), \'%d/%m/%Y\');');

            if ($query > 0) {
                $result = DB::select('select t.id
                                          from tasks as t
                                         where t.status < 100
                                           and date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 1 day), \'%d/%m/%Y\')
                                            or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 3 day), \'%d/%m/%Y\')
                                            or date_format(t.prazo_finalizacao, \'%d/%m/%Y\') = date_format((now() + interval 7 day), \'%d/%m/%Y\');');   
                
                for ($i = 0; $i < count($result); $i++) { 
                    TaskController::remember($result[$i]->id);
                    sleep(10);
                }
            }

        })->daily();



    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands() {
        require base_path('routes/console.php');
    }
}
